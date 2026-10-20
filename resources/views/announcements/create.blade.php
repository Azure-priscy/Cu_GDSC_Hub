@extends('layouts.base')

@section('content')

<h2>Create Announcement</h2>

<form action="{{ route('announcements.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label class="form-label">Title</label>

        <input
            type="text"
            name="title"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Message</label>

        <textarea
            name="message"
            class="form-control"
            rows="5"
            required
        ></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Publish Date</label>

        <input
            type="date"
            name="publish_date"
            class="form-control"
            value="{{ date('Y-m-d') }}"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">
        Save Announcement
    </button>

</form>

@endsection