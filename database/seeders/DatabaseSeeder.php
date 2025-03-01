<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Author::factory(5)->create();
        $genres = Genre::factory(15)->create();
        $books = Book::factory(50)->create();

        foreach ($books as $book) {
            $genresIds = $genres->random(5)->pluck('id');
            $book->genres()->attach($genresIds);
        }
    }
}
