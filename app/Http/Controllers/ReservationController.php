<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservation.reservation', [
            'rooms' => Room::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'full_name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'organization_id' => 'required|integer|exists:organizations,id',
            'email' => 'required|email',
            'attendees' => 'required|integer|min:1',
        ]);
    
        $availableRooms = $this->findBestFit(
            $request->date,
            $request->start_time,
            $request->end_time,
            $request->attendees
        );
    
        if ($availableRooms->isEmpty()) {
            return redirect()->back()->with('error', 'No available rooms for the requested date and time. or the room capacity is not enough for the attendees.');
        }
    
        $room = $availableRooms->first();
    
        \Log::info('Data to save:', $request->only(['date', 'start_time', 'end_time', 'full_name', 'whatsapp', 'organization_id', 'email', 'attendees']));
    
        Reservation::create(array_merge(
            $request->only(['date', 'start_time', 'end_time', 'full_name', 'whatsapp', 'organization_id', 'organization_id', 'email', 'attendees']),
            ['room_id' => $room->id]
        ));
    
        return redirect()->back()->with('success', 'Reservation created successfully in room: ' . $room->name . '.');
    }
    

    private function findBestFit($date, $startTime, $endTime, $attendees)
{
    // Ambil semua data ruangan dari tabel 'rooms'
    $rooms = Room::all();

    // Buat koleksi kosong untuk menyimpan ruangan yang tersedia
    $availableRooms = collect();

    // Loop melalui setiap ruangan untuk memeriksa ketersediaannya
    foreach ($rooms as $room) {
        // Cek apakah kapasitas ruangan mencukupi jumlah peserta
        if ($room->capacity >= $attendees) {
            // Cek apakah ada reservasi yang bentrok dengan waktu yang diminta
            $reservations = Reservation::where('room_id', $room->id)
                ->where('date', $date) // Sesuaikan tanggal
                ->where(function ($query) use ($startTime, $endTime) {
                    // Cek apakah waktu mulai atau waktu akhir bentrok dengan waktu yang diminta
                    $query->whereBetween('start_time', [$startTime, $endTime])
                          ->orWhereBetween('end_time', [$startTime, $endTime])
                          ->orWhere(function ($q) use ($startTime, $endTime) {
                              // Atau cek jika waktu mulai lebih awal dan waktu akhir lebih akhir
                              $q->where('start_time', '<=', $startTime)
                                ->where('end_time', '>=', $endTime);
                          });
                })
                ->exists(); // Mengembalikan true jika ada reservasi yang bentrok

            // Jika tidak ada bentrok dengan reservasi lain, tambahkan ruangan ke daftar ruangan tersedia
            if (!$reservations) {
                $availableRooms->push($room);
            }
        }
    }

    // Kembalikan daftar ruangan yang tersedia
    return $availableRooms;
}

}
