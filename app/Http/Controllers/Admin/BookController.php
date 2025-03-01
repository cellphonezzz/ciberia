<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\StoreRequest;
use App\Http\Requests\Admin\Book\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends BaseContoller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::with('author', 'genres');

        $this->service->search($request, $query);

        $books = $query->paginate(10);
        $authors = Author::all();
        $genres = Genre::all();

        return view('admin.books.index', compact('books', 'authors', 'genres'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.books.create', compact('authors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public
    function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.books.edit', compact('book', 'authors', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();
        $this->service->update($data, $book);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');

    }
}
