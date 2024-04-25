<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\BooksCategoriesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/authors', AuthorController::class);
Route::apiResource('/books', BookController::class);
Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/books-categories', BooksCategoriesController::class)->only([
    'store', 'destroy'
]);
Route::get('/books', [BooksCategoriesController::class, 'index']);
