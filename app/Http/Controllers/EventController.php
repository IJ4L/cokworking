<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Event::create([
            'url' => $imagePath,
            'type' => $request->category,
        ]);

        return redirect()->back()->with('success', 'Event created successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->url) {
            \Storage::delete($event->url);
        }
        $event->delete();
    
        return redirect()->back()->with('success', 'Event deleted successfully.');
    }
}