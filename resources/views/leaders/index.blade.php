@extends('layouts.base')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>Club Leaders</h2>

    <a href="{{ route('leaders.create') }}"
       class="btn btn-primary">
        Add Leader
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
            <th>Full Name</th>
            <th>Course</th>
            <th>Level</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>

    </thead>

    <tbody>

        @forelse($leaders as $leader)

            <tr>

                <td>
                    {{ $leader->full_name }}
                </td>

                <td>
                    {{ $leader->course }}
                </td>

                <td>
                    {{ $leader->level }}
                </td>

                <td>
                    {{ $leader->position }}
                </td>

                <td>

                    <a href="{{ route('leaders.show', $leader->id) }}"
                       class="btn btn-info btn-sm">
                        View
                    </a>

                    <a href="{{ route('leaders.edit', $leader->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('leaders.destroy', $leader->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this leader?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center">
                    No leaders found.
                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection