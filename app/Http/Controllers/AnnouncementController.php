<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view('announcements.index', compact('announcements'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
    $request->validate([
        'title' => 'required',
        'message' => 'required',
        'publish_date' => 'required|date',
    ]);

    Announcement::create([
        'title' => $request->title,
        'message' => $request->message,
        'publish_date' => $request->publish_date,
    ]);

    return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
{
    $request->validate([
        'title' => 'required',
        'message' => 'required',
        'publish_date' => 'required|date',
    ]);

    $announcement->update([
        'title' => $request->title,
        'message' => $request->message,
        'publish_date' => $request->publish_date,
    ]);

    return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }
}
