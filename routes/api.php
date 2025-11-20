<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('books', BookController::class);

// Optional: Custom routes
Route::get('/books/search/{keyword}', [BookController::class, 'search']);
Route::put('/books/{id}/status', [BookController::class, 'updateStatus']);