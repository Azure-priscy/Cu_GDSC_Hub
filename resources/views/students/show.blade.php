@extends('layouts.base')

@section('content')

<div class="card">

    <div class="card-header">

        Student Details

    </div>

    <div class="card-body">

        <p><strong>Name:</strong> {{ $student->full_name }}</p>

        <p><strong>Email:</strong> {{ $student->email }}</p>

        <p><strong>Phone:</strong> {{ $student->phone }}</p>

        <p><strong>Department:</strong> {{ $student->department }}</p>

        <p><strong>Level:</strong> {{ $student->level }}</p>

        <p><strong>Interest Area:</strong> {{ $student->interest_area }}</p>

        <p><strong>Date Joined:</strong> {{ $student->date_joined }}</p>

    </div>

</div>

@endsection