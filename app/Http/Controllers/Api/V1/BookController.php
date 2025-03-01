<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->paginate(10);

        return response()->json($books);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load('author', 'genres');

        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Book $book)
    {

        if (auth()->user() && auth()->user()->author_id !== $book->author->id) {
            return response()->json(['message' => 'You are not authorized to update this book'], 403);
        }

        $data = $request->validated();
        $book->update($data);

        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        if (auth()->user() && auth()->user()->author_id !== $book->author->id) {
            return response()->json(['message' => 'You are not authorized to delete this book'], 403);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
