@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Library
            </h2>

            <p class="text-muted">
                Manage books and inventory
            </p>

        </div>

        <a href="{{ route('books.create') }}"
           class="btn btn-primary">

            + Add Book

        </a>

        <a href="{{ route('borrowings.index') }}"
           class="btn btn-outline-primary">

            Borrowing Records

        </a>

    </div>


        @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif


    <div class="card shadow-sm border-0">

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($books as $book)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $book->title }}</td>

                        <td>{{ $book->author }}</td>

                        <td>{{ $book->category }}</td>

                        <td>{{ $book->quantity }}</td>

                        <td>

                            <a href="{{ route('books.edit', $book->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <a href="{{ route('books.show', $book->id) }}"
                               class="btn btn-info btn-sm">

                                View
                            </a>

                            <a href="{{ route('books.restock', $book->id) }}"
                                class="btn btn-success btn-sm">

                                    Restock
                             </a>

                            @if($book->quantity > 0)
                                <a href="{{ route('borrowings.create', $book->id) }}"
                                   class="btn btn-primary btn-sm">

                                    Borrow

                                </a>
                            @endif

                            <form action="{{ route('books.destroy', $book->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this book?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center">

                            No books found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection


