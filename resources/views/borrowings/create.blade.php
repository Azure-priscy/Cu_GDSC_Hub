@extends('layouts.base')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Borrow Book
    </h2>

    <div class="card">

        <div class="card-body">

            <p>

                <strong>Book:</strong>

                {{ $book->title }}

            </p>

            <p>

                <strong>Available Copies:</strong>

                {{ $book->quantity }}

            </p>

            <form action="{{ route('borrowings.store', $book->id) }}"
                  method="POST">

                @csrf

                <div class="mb-3">

    <label class="form-label">

        Select Member

    </label>

    <select name="student_id"
            class="form-control">

        @foreach($students as $student)

            <option value="{{ $student->id }}">

                {{ $student->full_name }}

            </option>

        @endforeach

    </select>

</div>

<!--due date input-->
<div class="mb-3">

    <label class="form-label">

        Due Date

    </label>

    <input type="date"
           name="due_date"
           class="form-control">

</div>


<button type="submit"
        class="btn btn-primary">

    Borrow Book

</button>

</form>

</div>

</div>

</div>

@endsection