<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Load the related book and student once to avoid extra database queries in the view.
        $borrowings = Borrowing::with(['book', 'student'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book)
    {
        $students = Student::orderBy('full_name')->get();
        return view('borrowings.create',compact('book','students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        // Keep stock and the borrowing record in sync: either both save or neither does.
        $wasBorrowed = DB::transaction(function () use ($request, $book) {
            $book = Book::lockForUpdate()->findOrFail($book->id);

            if ($book->quantity <= 0) {
                return false;
            }

            Borrowing::create([
                'book_id' => $book->id,
                'student_id' => $request->student_id,
                'borrow_date' => now(),
                'due_date' => $request->due_date,
                'status' => 'Borrowed',
            ]);

            $book->decrement('quantity');

            return true;
        });

        if (! $wasBorrowed) {
            return back()->with('error', 'No copies are currently available.');
        }

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Book borrowed successfully.');
    }
        
        
    
    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        //
    }

    /**
     * Record a book return and make one copy available in the library.
     */
    public function returnBook(Borrowing $borrowing)
    {
        $wasReturned = DB::transaction(function () use ($borrowing) {
            // Lock the record so the same loan cannot be returned twice at once.
            $borrowing = Borrowing::lockForUpdate()->findOrFail($borrowing->id);

            if ($borrowing->status === 'Returned') {
                return false;
            }

            $borrowing->update([
                'return_date' => now(),
                'status' => 'Returned',
            ]);

            Book::whereKey($borrowing->book_id)->increment('quantity');

            return true;
        });

        if (! $wasReturned) {
            return back()->with('error', 'This book has already been returned.');
        }

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Book returned successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        //
    }




}
