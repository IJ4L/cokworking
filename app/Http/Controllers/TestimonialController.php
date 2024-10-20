<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Room;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function show()
    {
        $testimonials = Testimonial::all(); 
        $events = Event::all();
        $rooms = Room::with('reservations')->get();
    
        $reservations = [];
        foreach ($rooms as $room) {
            foreach ($room->reservations as $reservation) {
                $date = $reservation->date instanceof \Carbon\Carbon
                    ? $reservation->date->format('Y-m-d')
                    : \Carbon\Carbon::parse($reservation->date)->format('Y-m-d');
    
                $reservations[$room->id][$date][] = [
                    'start_time' => $reservation->start_time,
                    'end_time' => $reservation->end_time,
                    'full_name' => $reservation->full_name,
                    'whatsapp' => $reservation->whatsapp,
                    'organization' => $reservation->organisation, 
                    'email' => $reservation->email,
                ];
            }
        }
    
        return view('layouts.app', compact('events', 'testimonials', 'rooms', 'reservations'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create([
            'customer_name' => $request->customer_name,
            'testimonial' => $request->testimonial,
            'image' => $imagePath,
        ]);
        
        return redirect()->route('admin.testimonials')->with('success', 'Testimonial created successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        if ($testimonial->image) {
            \Storage::delete('public/' . $testimonial->image);
        }
    
        $testimonial->delete();
    
        return redirect()->route('admin.testimonials')->with('success', 'Testimonial deleted successfully.');
    }
}