<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Testimonial;
use App\Models\Reservation;
use App\Models\Organization;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $reservationCounts = [
            'Perguruan Tinggi' => Reservation::whereHas('organization', function ($query) {
                $query->where('name', 'Perguruan Tinggi');
            })->count(),
            'Komunitas'        => Reservation::whereHas('organization', function ($query) {
                $query->where('name', 'Komunitas');
            })->count(),
            'Bisnis'           => Reservation::whereHas('organization', function ($query) {
                $query->where('name', 'Bisnis');
            })->count(),
            'Instansi'         => Reservation::whereHas('organization', function ($query) {
                $query->where('name', 'Instansi');
            })->count(),
            'Media'            => Reservation::whereHas('organization', function ($query) {
                $query->where('name', 'Media');
            })->count(),
            'Other'            => Reservation::whereHas('organization', function ($query) {
                $query->whereNotIn('name', ['Komunitas', 'Perguruan Tinggi']);
            })->count(),
        ];

        $totalReservations = array_sum($reservationCounts);

        $organizations = Organization::all();

        $query = Reservation::with(['room', 'organization']);

        if ($request->has('organization_id') && $request->organization_id != '') {
            $query->where('organization_id', $request->organization_id);
        }

        $reservations = $query->paginate(10);

        return view('admin.index', compact('reservationCounts', 'totalReservations', 'reservations', 'organizations'));
    }


    public function events()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    public function testimonial()
    {
        $testimonials = Testimonial::paginate(10);

        return view('admin.testimonial.index', compact('testimonials'));
    }
}