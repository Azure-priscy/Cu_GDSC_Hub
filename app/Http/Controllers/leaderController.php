<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leader;
use App\Models\Event;

class leaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $leaders = leader::latest()->get();
        return view('leaders.index',compact('leaders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leaders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'course' => 'required',
        'level' => 'required',
        'position' => 'required',
        'date_joined' => 'required|date',
    ]);

    $course = $request->course;

    if ($request->course === 'Other') {
        $course = $request->other_course;
    }

    leader::create([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'course' => $course,
        'level' => $request->level,
        'position' => $request->position,
        'date_joined' => $request->date_joined,
    ]);

    return redirect()
        ->route('leaders.index')
        ->with('success', 'Leader added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(leader $leader)
    {
        return view('leaders.show', compact('leader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(leader $leader)
    {
       return view('leaders.edit',compact('leader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
