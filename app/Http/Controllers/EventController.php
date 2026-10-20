<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\leader;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $events = Event::with('leader')->latest()->get();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaders = leader::all();
        $events = new Event(); // Create a new instance of the Event model

        return view('events.create', compact('leaders', 'events'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'venue' => 'nullable',
            'leader_id' => 'required|exists:leaders,id',
        ]);

        Event::create($request->all());

        return redirect()
            ->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $leaders = leader::all();

        return view('events.edit', compact('event', 'leaders'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'venue' => 'nullable',
            'leader_id' => 'required|exists:leaders,id',
        ]);

        $event->update($request->all());

        return redirect()
            ->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
