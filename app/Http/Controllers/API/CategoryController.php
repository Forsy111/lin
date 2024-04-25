<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::all());
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }
    public function show(Category $category)
    {
        return response()->json($category);
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $category->update($request->all());
        return response()->json($category);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }

}
