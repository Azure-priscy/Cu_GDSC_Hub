@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Borrowing Records</h2>
            <p class="text-muted">Track active loans and returned books.</p>
        </div>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Back to Library
        </a>

    </div>

    {{-- Messages displayed after borrowing or returning a book. --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Book</th>
                            <th>Student</th>
                            <th>Borrowed</th>
                            <th>Due Date</th>
                            <th>Returned</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($borrowings as $borrowing)
                            {{-- A loan is overdue only while it has not been returned. --}}
                            @php
                                $isOverdue = $borrowing->status === 'Borrowed'
                                    && $borrowing->due_date->isPast();
                            @endphp
                            <tr class="{{ $isOverdue ? 'table-danger' : '' }}">
                                <td>{{ $borrowing->book->title }}</td>
                                <td>{{ $borrowing->student->full_name }}</td>
                                <td>{{ $borrowing->borrow_date->format('M d, Y') }}</td>
                                <td>{{ $borrowing->due_date->format('M d, Y') }}</td>
                                <td>{{ $borrowing->return_date?->format('M d, Y') ?? 'Not returned' }}</td>
                                <td>
                                    @if($isOverdue)
                                        <span class="badge bg-danger">Overdue</span>
                                    @elseif($borrowing->status === 'Returned')
                                        <span class="badge bg-success">Returned</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Borrowed</span>
                                    @endif
                                </td>
                                <td>
                                    @if($borrowing->status === 'Borrowed')
                                        {{-- PATCH is used because returning updates an existing record. --}}
                                        <form action="{{ route('borrowings.return', $borrowing->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Mark this book as returned?')">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="btn btn-success btn-sm">
                                                Return Book
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted">Completed</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No borrowing records yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
