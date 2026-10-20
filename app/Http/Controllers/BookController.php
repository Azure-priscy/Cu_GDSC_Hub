<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable'
        ]);

        Book::create($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book = Book::findOrFail($book->id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $book = Book::findOrFail($book->id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable'
        ]);

        $book->update($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }


    public function restockForm(Book $book)
    {
        return view('books.restock', compact('book'));
    }


        public function restock(Request $request, Book $book)
    {
        $request->validate([
            'quantity_added' => 'required|integer|min:1'
        ]);

        $book->quantity += $request->quantity_added;

        $book->save();

        return redirect()
            ->route('books.show', $book->id)
            ->with(
                'success',
                'Book restocked successfully.'
            );
    }
}
