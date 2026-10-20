@extends('layouts.base')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="fw-bold">
                {{ $book->title }}
            </h2>

            <hr>

            <p>
                <strong>Author:</strong>
                {{ $book->author }}
            </p>

            <p>
                <strong>Category:</strong>
                {{ $book->category }}
            </p>

            <p>
                <strong>Stock:</strong>
                {{ $book->quantity }}
            </p>

            <p>
                <strong>Description:</strong>
                {{ $book->description ?? 'No description available' }}
            </p>

            <a href="{{ route('books.edit', $book->id) }}"
               class="btn btn-warning">

                Edit

            </a>

            <a href="{{ route('books.index') }}"
               class="btn btn-secondary">

                Back

            </a>

            <a href="{{ route('borrowings.create', $book->id) }}"
            class="btn btn-success">

                Borrow Book

            </a>

        </div>

    </div>

</div>

@endsection