<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Author::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
        ]);
        $author = Author::create($request->all());
        return response()->json($author, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
        ]);
        $author->update($request->all());
        return response()->json($author);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
        $author->delete();
        return response()->json(null, 204);

    }
}
