@extends('layouts.base')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header">
            <h3>{{ $event->title }}</h3>
        </div>

        <div class="card-body">

            <p>
                <strong>Description:</strong><br>
                {{ $event->description }}
            </p>

            <p>
                <strong>Date:</strong>
                {{ $event->event_date }}
            </p>

            <p>
                <strong>Time:</strong>
                {{ $event->event_time }}
            </p>

            <p>
                <strong>Venue:</strong>
                {{ $event->venue }}
            </p>

            <p>
                <strong>Leader:</strong>
                {{ $event->leader->full_name }}
            </p>

            <a href="{{ route('events.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

</div>

@endsection