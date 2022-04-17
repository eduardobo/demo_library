<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
        ->when($request->input('search'), function($query, $search) {
            $query->where('description', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString();

        return Inertia::render('Categories/Index', [
            'categoriesPage' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3']
        ]);
        
        Category::create($attributes);

        return redirect()->route('categories.index');
    }

    public function update(Request $request, Category $category)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3']
        ]);

        $category->update($attributes);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
