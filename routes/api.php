<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);

Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::post('books', [BookController::class, 'store'])->name('books.store');
Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');

Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('authors/{author}', [AuthorController::class, 'show'])->name('authors.show');

Route::middleware('auth:sanctum')->group(function () {
    Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::put('authors/{author}', [AuthorController::class, 'update'])->name('authors.update');
});


Route::apiResource('genres', GenreController::class);
