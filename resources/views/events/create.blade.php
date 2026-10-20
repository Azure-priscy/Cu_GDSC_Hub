@extends('layouts.base')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header">

                    <h3 class="mb-0">
                        Create Event
                    </h3>

                </div>


                <div class="card-body">

                    <form action="{{ route('events.store') }}" method="POST">

                        @csrf


                        <!-- Event Title -->

                        <div class="mb-3">

                            <label for="title" class="form-label">
                                Event Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control"
                                placeholder="Enter event title"
                                value="{{ old('title') }}"
                            >

                        </div>


                        <!-- Description -->

                        <div class="mb-3">

                            <label for="description" class="form-label">
                                Description
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                rows="4"
                                placeholder="Enter event description"
                            >{{ old('description') }}</textarea>

                        </div>


                        <!-- Event Date -->

                        <div class="mb-3">

                            <label for="event_date" class="form-label">
                                Event Date
                            </label>

                            <input
                                type="date"
                                name="event_date"
                                id="event_date"
                                class="form-control"
                                value="{{ old('event_date') }}"
                            >

                        </div>


                        <!-- Event Time -->

                        <div class="mb-3">

                            <label for="event_time" class="form-label">
                                Event Time
                            </label>

                            <input
                                type="time"
                                name="event_time"
                                id="event_time"
                                class="form-control"
                                value="{{ old('event_time') }}"
                            >

                        </div>


                        <!-- Venue -->

                        <div class="mb-3">

                            <label for="venue" class="form-label">
                                Venue
                            </label>

                            <input
                                type="text"
                                name="venue"
                                id="venue"
                                class="form-control"
                                placeholder="Enter event venue"
                                value="{{ old('venue') }}"
                            >

                        </div>


                        <!-- Leader -->

                <div class="mb-3">

                     <label for="leader_id" class="form-label">
                            Event Leader
                        </label>

                        <select name="leader_id" id="leader_id" class="form-select">

                            <option value="">
                                Select Event Leader
                            </option>

                            @foreach($leaders as $leader)

                                <option value="{{ $leader->id }}">
                                    {{ $leader->full_name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                        <!-- Buttons -->

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Save Event
                            </button>

                            <a
                                href="{{ route('events.index') }}"
                                class="btn btn-secondary"
                            >
                                Cancel
                            </a>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection