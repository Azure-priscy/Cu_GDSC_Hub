@extends('layouts.base')

@section('content')

<h2>Edit Announcement</h2>

<form action="{{ route('announcements.update', $announcement->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label class="form-label">
            Title
        </label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ $announcement->title }}"
            required
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Message
        </label>

        <textarea
            name="message"
            class="form-control"
            rows="5"
            required>{{ $announcement->message }}</textarea>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Publish Date
        </label>

        <input
            type="date"
            name="publish_date"
            class="form-control"
            value="{{ $announcement->publish_date }}"
            required
        >

    </div>

    <button class="btn btn-primary">
        Update Announcement
    </button>

</form>

@endsection