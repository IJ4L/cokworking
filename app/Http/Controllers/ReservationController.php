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
        // Validate request data
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'full_name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'organization_id' => 'required|integer|exists:organizations,id', // Ensure valid organization
            'email' => 'required|email',
            'attendees' => 'required|integer|min:1',
        ]);
    
        // Find available rooms based on the input
        $availableRooms = $this->findBestFit(
            $request->date,
            $request->start_time,
            $request->end_time,
            $request->attendees
        );
    
        if ($availableRooms->isEmpty()) {
            return back()->withErrors(['message' => 'No available rooms found.']);
        }
    
        $room = $availableRooms->first();
    
        // Log data before saving
        \Log::info('Data to save:', $request->only(['date', 'start_time', 'end_time', 'full_name', 'whatsapp', 'organization_id', 'email', 'attendees']));
    
        // Create the reservation
        Reservation::create(array_merge(
            $request->only(['date', 'start_time', 'end_time', 'full_name', 'whatsapp', 'organization_id', 'organization_id', 'email', 'attendees']),
            ['room_id' => $room->id] // Add room ID
        ));
    
        return redirect()->back()->with('success', 'Reservation created successfully in room: ' . $room->name . '.');
    }
    

    private function findBestFit($date, $startTime, $endTime, $attendees)
    {
        $rooms = Room::all();
        $availableRooms = collect();

        foreach ($rooms as $room) {
            // Check room capacity
            if ($room->capacity >= $attendees) {
                $reservations = Reservation::where('room_id', $room->id)
                    ->where('date', $date)
                    ->where(function ($query) use ($startTime, $endTime) {
                        $query->whereBetween('start_time', [$startTime, $endTime])
                              ->orWhereBetween('end_time', [$startTime, $endTime])
                              ->orWhere(function ($q) use ($startTime, $endTime) {
                                  $q->where('start_time', '<=', $startTime)
                                    ->where('end_time', '>=', $endTime);
                              });
                    })
                    ->exists(); 

                if (!$reservations) {
                    $availableRooms->push($room);
                }
            }
        }

        return $availableRooms;
    }
}
