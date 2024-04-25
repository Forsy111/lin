<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class BooksCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index()
     {
         return response()->json(Book::with('categories')->get());
     }

     public function store(Request $request)
     {
         $request->validate([
             'book_id' => 'required|exists:books,id',
             'category_id' => 'required|exists:categories,id',
         ]);
         $book = Book::find($request->input('book_id'));
         $book->categories()->attach($request->input('category_id'));
         return response()->json(($book->load('categories')), 201);
     }

     public function destroy(Request $request, Book $book)
     {
         $request->validate([
             'book_id' => 'required|exists:books,id',
             'category_id' => 'required|exists:categories,id',
         ]);
         $book = Book::find($request->input('book_id'));
         $book->categories()->detach($request->input('category_id'));
         return response()->json(($book->load('categories')), 200);
     }
 
}
