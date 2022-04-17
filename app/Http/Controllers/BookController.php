<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index(Request $request) {
        $booksPage = Book::select('id', 'name', 'author', 'publication_date', 'category_id', 'borrowing_user_id')
        ->when($request->input('search'), function($query, $search) {
            $query->Where('name', 'like', "%{$search}%");
        })
        ->with(['category:id,name', 'user:id,name'])
        ->paginate(10)
        ->withQueryString();

        $users = User::all();

        return Inertia::render('Books/Index', [
            'booksPage' => $booksPage,
            'users' => $users,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        $book = new Book();
        $categories = Category::all();
        $users = User::all();

        return Inertia::render('Books/Create', [
            'book' => $book,
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'author' => ['required', 'string', 'min:3'],
            'category_id' => ['required', 'numeric'],
            'publication_date' => ['required', 'date']
        ]);

        Book::create($attributes);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        $book->load('category', 'user');
        $categories = Category::all();
        $users = User::all();

        return Inertia::render('Books/Create', [
            'book' => $book,
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function update(Request $request, Book $book) {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'author' => ['required', 'string', 'min:3'],
            'category_id' => ['required', 'numeric'],
            'publication_date' => ['required', 'date']
        ]);

        $book->update($attributes);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book) {
        $book->delete();

        return redirect()->route('books.index');
    }

    public function updateBorrowingUser(Request $request, Book $book) {
        $book->update(['borrowing_user_id' => $request->get('borrowing_user')]);

        return redirect()->route('books.index');
    }
}
