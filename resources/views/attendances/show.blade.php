@extends('layouts.base')

@section('content')

<h2>Attendance Details</h2>

<p>
    Student:
    {{ $attendance->student->full_name }}
</p>

<p>
    Event:
    {{ $attendance->event_name }}
</p>

<p>
    Date:
    {{ $attendance->date }}
</p>

<p>
    Status:
    {{ $attendance->status }}
</p>

<a href="{{ route('attendances.index') }}">
    Back to Attendance
</a>

@endsection
