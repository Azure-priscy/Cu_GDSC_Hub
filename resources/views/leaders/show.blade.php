@extends('layouts.base')

@section('content')

<h2>Leader Details</h2>

<div class="mb-3">
    <strong>Full Name:</strong>
    {{ $leader->full_name }}
</div>

<div class="mb-3">
    <strong>Email:</strong>
    {{ $leader->email }}
</div>

<div class="mb-3">
    <strong>Phone:</strong>
    {{ $leader->phone }}
</div>

<div class="mb-3">
    <strong>Course:</strong>
    {{ $leader->course }}
</div>

<div class="mb-3">
    <strong>Level:</strong>
    {{ $leader->level }}
</div>

<div class="mb-3">
    <strong>Position:</strong>
    {{ $leader->position }}
</div>

<div class="mb-3">
    <strong>Date Joined:</strong>
    {{ $leader->date_joined }}
</div>

<a href="{{ route('leaders.index') }}"
   class="btn btn-secondary">
    Back to Leaders
</a>

@endsection