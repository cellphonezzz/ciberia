<?php

namespace App\Service;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class BookService
{

    public function search($request, $query)
    {

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('author_id')) {
            $query->where('author_id', $request->author_id);
        }

        if ($request->filled('genre_id')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('genres.id', $request->genre_id);
            });
        }

        if ($request->has('sort_by')) {
            $sortOrder = $request->get('sort_order', 'asc');
            $query->orderBy('title', $sortOrder);
        } else {
            $query->orderBy('title', 'asc');
        }

        return $query;
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['genre_ids'])) {
                $genreIds = $data['genre_ids'];
                unset($data['genre_ids']);
            }

            $book = Book::firstOrCreate($data);
            if ($genreIds) {
                $book->genres()->attach($genreIds);
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($data, $book)
    {
        try {
            DB::beginTransaction();
            if (isset($data['genre_ids'])) {
                $genreIds = $data['genre_ids'];
                unset($data['genre_ids']);
            }

            $book->update($data);
            if ($genreIds) {
                $book->genres()->sync($genreIds);
            }

            $book->update($data);
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }

    }
}
