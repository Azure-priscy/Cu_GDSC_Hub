@extends('layouts.base')

@section('content')

<form method="GET"
      action="{{ route('attendances.index') }}"
      class="mb-3">

    <div class="row">

        <div class="col-md-4">

            <select name="event_name"
                    class="form-select">

                <option value="">
                    
                    All Events
                </option>

                @foreach($events as $event)

                    <option
                        value="{{ $event }}"
                        {{ request('event_name') == $event ? 'selected' : '' }}>

                        {{ $event }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary">
                Filter
            </button>

        </div>

    </div>

</form>

<div class="d-flex justify-content-between mb-3">

    <h2>Attendance Records</h2>

    <a href="{{ route('attendances.create') }}"
       class="btn btn-primary">

        Mark Attendance

    </a>

</div>

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Student</th>
            <th>Event</th>
            <th>Date</th>
            <th>Status</th>

        </tr>

    </thead>

    <tbody>

        @forelse($attendances as $attendance)

            <tr>

                <td>
                    {{ $attendance->student->full_name }}
                </td>

                <td>
                    {{ $attendance->event_name }}
                </td>

                <td>
                    {{ $attendance->date }}
                </td>

                <td>
                    {{ $attendance->status }}
                </td>

                <td>

                    <a href="{{ route('attendances.edit', $attendance->id) }}"
                       class="btn btn-warning">
                        Edit
                    </a>

                    <a href="{{ route('attendances.show', $attendance->id) }}"
                       class="btn btn-info">
                        View
                    </a>

                    <form action="{{ route('attendances.destroy', $attendance->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4" class="text-center">

                    No attendance records found.

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection
