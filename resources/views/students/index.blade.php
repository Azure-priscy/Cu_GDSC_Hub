@extends('layouts.base')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Students</h2>

    <a href="{{ route('students.create') }}"
       class="btn btn-success">
       Add Student
    </a>

</div>

<table class="table table-bordered">

    <thead>

        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Level</th>
            <th>Actions</th>
        </tr>

    </thead>

    <tbody>

    @foreach($students as $student)

        <tr>

            <td>{{ $student->full_name }}</td>

            <td>{{ $student->email }}</td>

            <td>{{ $student->department }}</td>

            <td>{{ $student->level }}</td>

            <td>

                <a href="{{ route('students.show',$student) }}"
                   class="btn btn-info btn-sm">
                   View
                </a>

                <a href="{{ route('students.edit',$student) }}"
                   class="btn btn-warning btn-sm">
                   Edit
                </a>

                <form action="{{ route('students.destroy',$student) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection