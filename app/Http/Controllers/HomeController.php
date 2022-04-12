<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index() {
        $books = Book::take(5);

        return Inertia::render('Home', [
            'books' => $books
        ]);
    }

    public function searcher(Request $request) {

    }
}
