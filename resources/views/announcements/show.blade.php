@extends('layouts.base')

@section('content')

<h2>{{ $announcement->title }}</h2>

<p>
    <strong>Publish Date:</strong>
    {{ $announcement->publish_date }}
</p>

<p>
    {{ $announcement->message }}
</p>

<a href="{{ route('announcements.index') }}"
   class="btn btn-secondary">
    Back
</a>

@endsection