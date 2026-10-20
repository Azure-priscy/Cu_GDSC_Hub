@extends('layouts.base')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Announcements</h2>

    <a href="{{ route('announcements.create') }}"
       class="btn btn-primary">
        New Announcement
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
            <th>Title</th>
            <th>Publish Date</th>
            <th>Actions</th>
        </tr>

    </thead>

    <tbody>

        @forelse($announcements as $announcement)

            <tr>

                <td>{{ $announcement->title }}</td>

                <td>{{ $announcement->publish_date }}</td>

                <td>

                    <a href="{{ route('announcements.show', $announcement->id) }}"
                       class="btn btn-info btn-sm">
                        View
                    </a>

                    <a href="{{ route('announcements.edit', $announcement->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('announcements.destroy', $announcement->id) }}"
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

                <td colspan="3" class="text-center">
                    No announcements found.
                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection