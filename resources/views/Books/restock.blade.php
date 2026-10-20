@extends('layouts.base')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-body">

            <h2>
                Restock Book
            </h2>

            <hr>

            <p>

                <strong>Title:</strong>

                {{ $book->title }}

            </p>

            <p>

                <strong>Current Stock:</strong>

                {{ $book->quantity }}

            </p>

            <form
                action="{{ route('books.restock.store', $book->id) }}"
                method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Quantity Added

                    </label>

                    <input
                        type="number"
                        name="quantity_added"
                        min="1"
                        class="form-control">

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    Restock

                </button>

            </form>

        </div>

    </div>

</div>

@endsection