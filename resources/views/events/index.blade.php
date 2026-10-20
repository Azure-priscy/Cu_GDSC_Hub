@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Events</h2>
            <p class="text-muted">
                Manage CU GDSC events
            </p>
        </div>

        <a href="{{ route('events.create') }}"
           class="btn btn-primary">

            + Create Event

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Leader</th>
                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($events as $event)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $event->title }}</td>

                                <td>{{ $event->event_date }}</td>

                                <td>{{ $event->event_time ?? '-' }}</td>

                                <td>{{ $event->venue ?? '-' }}</td>

                                <td>{{ $event->leader->full_name }}</td>

                                <td>

                                    <a href="{{ route('events.show', $event->id) }}"
                                       class="btn btn-sm btn-info">
                                        View
                                    </a>

                                    <a href="{{ route('events.edit', $event->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('events.destroy', $event->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this event?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center text-muted">

                                    No events available.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection