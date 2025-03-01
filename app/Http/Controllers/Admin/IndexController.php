<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class IndexController extends Controller
{
    public function __invoke()
    {

        $authors = Author::all();
        $books = Book::all();
        $genres = Genre::all();
        return view('admin.index', compact('authors', 'books', 'genres'));
    }
}
