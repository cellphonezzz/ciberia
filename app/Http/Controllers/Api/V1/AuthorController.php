<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::withCount('books')->paginate(10);

        return response()->json($authors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $author = Author::with('books');

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        return response()->json($author);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author->load('books');

        return response()->json($author);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        if (auth()->user() && auth()->user()->author_id !== $author->id) {
            return response()->json(['message' => 'You can only update your own data'], 403);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $author->update($validated);

        return response()->json($author);
    }
}
