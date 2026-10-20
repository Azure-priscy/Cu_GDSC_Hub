@extends('layouts.base')

@section('content')

<h2>Edit Attendance</h2>

<form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Student</label>
        <select name="student_id" class="form-select" required>
            @foreach($students as $student)
                <option value="{{ $student->id }}" @selected($student->id == $attendance->student_id)>
                    {{ $student->full_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Event Name</label>
        <input type="text" name="event_name" value="{{ $attendance->event_name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" value="{{ $attendance->date }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-select">
            <option value="Present" @selected($attendance->status == 'Present')>Present</option>
            <option value="Absent" @selected($attendance->status == 'Absent')>Absent</option>
        </select>
    </div>

    <button class="btn btn-primary">Update Attendance</button>
</form>

@endsection
