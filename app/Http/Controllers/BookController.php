<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
{
    $genres = Genre::all();

    $genreId = $request->query('genre_id');
    $selected = $genres->firstWhere('id', $genreId);

    $query = Book::with('genre');

    if ($genreId) {
        $query = $query->where('genre_id', $genreId);
    }

    $books = $query->get();

    return view('books.index', compact('books', 'genres', 'selected'));
}

    public function create()
    {
        $genres = Genre::all();

        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1|max:2100',
            'is_available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Book::create($validated);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
{
    return view('books.show', compact('book'));
}

public function edit(Book $book)
{
    $genres = Genre::all();

    return view('books.edit', compact('book', 'genres'));
}

public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'year' => 'required|integer|min:1|max:2100',
        'is_available' => 'required|boolean',
        'genre_id' => 'required|exists:genres,id',
    ]);

    $book->update($validated);

    return redirect()->route('books.index');
}

public function destroy(Book $book)
{
    $book->delete();

    return redirect()->route('books.index');
}

    public function featured()
    {
        $book = Book::findOrFail(5); // 1984

        return view('books.show', compact('book'));
    }
}