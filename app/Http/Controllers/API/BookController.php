<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'year_published' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
        ]);
        $book = Book::create($request->all());
        return response()->json($book, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'year_published' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
        ]);
        $book->update($request->all());
        return response()->json($book);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return response()->json(null, 204);

    }
}
