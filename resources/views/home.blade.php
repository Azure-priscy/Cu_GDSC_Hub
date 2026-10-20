@extends('layouts.base')

@section('content')

<style>

    body {
        background-color: #f5f7fb;
    }

    .dashboard-welcome {
        background-color: #0d6efd;
        color: white;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 25px;
    }

    .dashboard-card {
        background-color: white;
        border: none;
        border-radius: 12px;
        min-height: 180px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        transition: 0.2s;
        display: flex;
        flex-direction: column;
    }

    .dashboard-card:hover {
        transform: translateY(-3px);
    }

    .dashboard-card .card-body {
        text-align: center;
        flex: 1;
        padding: 25px;
    }

    .dashboard-card h2 {
        font-weight: 700;
        margin-top: 15px;
    }

    .dashboard-card .card-footer {
        background-color: white;
        border: none;
        text-align: center;
        padding-bottom: 20px;
    }

    .recent-events {
        background-color: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

</style>


<!-- ================= WELCOME ================= -->

<div class="dashboard-welcome">

    <h1 class="fw-bold">
        Welcome to CU GDSC Hub
    </h1>

    <p class="mb-0">
        Manage members, leaders, attendance, events and
        announcements from one central platform.
    </p>

</div>


<!-- ================= FIRST ROW ================= -->

<div class="row g-4 mb-4">

    <!-- MEMBERS -->

    <div class="col-md-4">

        <div class="dashboard-card">

            <div class="card-body">

                <h6 class="text-muted">
                    Total Members
                </h6>

                <h2>
                    {{ $studentCount }}
                </h2>

            </div>

            <div class="card-footer">

                <a href="{{ route('students.index') }}"
                   class="btn btn-primary btn-sm">

                    View Members

                </a>

            </div>

        </div>

    </div>


    <!-- LEADERS -->

    <div class="col-md-4">

        <div class="dashboard-card">

            <div class="card-body">

                <h6 class="text-muted">
                    Leaders
                </h6>

                <h2>
                    {{ $leaderCount }}
                </h2>

            </div>

            <div class="card-footer">

                <a href="{{ route('leaders.index') }}"
                   class="btn btn-success btn-sm">

                    View Leaders

                </a>

            </div>

        </div>

    </div>


    <!-- EVENTS -->

    <div class="col-md-4">

        <div class="dashboard-card">

            <div class="card-body">

                <h6 class="text-muted">
                    Events
                </h6>

                <h2>
                    {{ $eventCount }}
                </h2>

            </div>

            <div class="card-footer">

                <a href="{{ route('events.index') }}"
                   class="btn btn-primary btn-sm">

                    View Events

                </a>

            </div>

        </div>

    </div>

</div>


<!-- ================= SECOND ROW ================= -->

<div class="row g-4 justify-content-center mb-5">

    <!-- ATTENDANCE -->

    <div class="col-md-4">

        <div class="dashboard-card">

            <div class="card-body">

                <h6 class="text-muted">
                    Attendance Rate
                </h6>

                <h2>
                    {{ $rate }}%
                </h2>

            </div>

            <div class="card-footer">

                <a href="{{ route('attendances.index') }}"
                   class="btn btn-info btn-sm">

                    Manage Attendance

                </a>

            </div>

        </div>

    </div>


    <!-- ANNOUNCEMENTS -->

    <div class="col-md-4">

        <div class="dashboard-card">

            <div class="card-body">

                <h6 class="text-muted">
                    Announcements
                </h6>

                <h2>
                    {{ $announcementCount }}
                </h2>

            </div>

            <div class="card-footer">

                <a href="{{ route('announcements.index') }}"
                   class="btn btn-secondary btn-sm">

                    Manage Announcements

                </a>

            </div>

        </div>

    </div>

    <!-- RESOURCES -->
     
    <div class="col-md-4">
        <div class="dashboard-card">

            <div class="card-body">

                <h6 class="text-muted">
                    Resources
                </h6>

                <h2>
                    {{ $resourceCount }}
                </h2>

            </div>

            <div class="card-footer">

                <a href="{{ route('resources.index') }}"
                   class="btn btn-warning btn-sm">

                    Manage Resources

                </a>

            </div>

        </div>
        </div>

</div>


<!-- ================= UPCOMING EVENTS ================= -->

<div class="upcoming-events">

    <h4 class="mb-3">
        Upcoming  Events
    </h4>

    <table class="table">

        <thead>

            <tr>

                <th>
                    Event Name
                </th>

                <th>
                    Date
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($upcomingEvents as $event)

                <tr>

                    <td>
                        {{ $event->title }}
                    </td>

                    <td>
                        {{ $event->event_date }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="2" class="text-muted">
                        No upcoming events available.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


@endsection