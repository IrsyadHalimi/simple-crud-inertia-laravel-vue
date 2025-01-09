<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return Inertia::render('Book/Index', [
            'books' => $books,
            'csrf' => csrf_token(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Book/Create', [
            'csrf' => csrf_token(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return Inertia::render('Book/Edit', [
            'book' => $book,
            'csrf' => csrf_token(),
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
