<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return Inertia::render('Books/Index', [
            'books' => $books,
        ]);
    }

    public function show(Book $book) {
        return Inertia::render('Event/Show', [
            'book' => $book->only(
                'id',
                'title',
                'start_date',
                'description'
            ),
        ]);
    }
}
