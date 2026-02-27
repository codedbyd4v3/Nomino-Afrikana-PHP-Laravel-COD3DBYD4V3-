<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    //  Create a new event
    public function add(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_type' => ['required', Rule::in(['festival', 'concert', 'workshop'])],
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]);

        $event = Event::create($validated);

        return response()->json([
            'message' => 'Event added successfully',
            'event_id' => $event->id,
        ]);
    }

    //  Get all events
    public function all()
    {
        $events = Event::with('galleryItems')->get();
        return response()->json($events);
    }

    //  Get a single event
    public function get($id)
    {
        $event = Event::with('galleryItems')->find($id);

        if (!$event) {
            return response()->json(['detail' => 'Event not found'], 404);
        }

        return response()->json($event);
    }

    //  Update an event
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['detail' => 'Event not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'event_type' => ['sometimes', Rule::in(['festival', 'concert', 'workshop'])],
            'date' => 'sometimes|date',
            'location' => 'sometimes|string|max:255|nullable',
            'description' => 'sometimes|string|nullable',
            'image' => 'sometimes|string|max:255|nullable',
        ]);

        $event->update($validated);

        return response()->json([
            'message' => 'Event updated successfully',
            'event_id' => $event->id,
        ]);
    }

    //  Delete an event
    public function delete($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['detail' => 'Event not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
