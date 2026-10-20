<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = Attendance::select('event_name')
            ->distinct()
            ->pluck('event_name');

        $attendances = Attendance::with('student');

        if ($request->filled('event_name')) {
            $attendances->where('event_name', $request->event_name);
        }

        $attendances = $attendances->latest()->get();

        return view(
            'attendances.index',
            compact('attendances', 'events')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::orderBy('full_name')->get();

        return view('attendances.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'event_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required',
        ]);

        Attendance::create([
            'student_id' => $request->student_id,
            'event_id' => $request->event_id,
            'event_name' => $request->event_name,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $students = Student::orderBy('full_name')->get();

        return view('attendances.edit', compact('attendance', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'event_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:Present,Absent',
        ]);

        $attendance->update($validated);

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance record deleted successfully.');
    }
}
