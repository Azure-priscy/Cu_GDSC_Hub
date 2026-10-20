@extends('layouts.base')

@section('content')

<h2>Mark Attendance</h2>

<form action="{{ route('attendances.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Student</label>
        <select name="student_id" class="form-select" required>
            <option value="">Select Student</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->full_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Event Name</label>
        <input type="text" name="event_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Event ID</label>
        <input type="text" name="event_id" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="">Select Status</option>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>
    </div>

    <button class="btn btn-primary">Save Attendance</button>
</form>

@endsection
