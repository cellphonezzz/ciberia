<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Genre extends Model
{
    use HasFactory;

    protected $table = 'book_genres';

    protected $fillable = ['book_id', 'genre_id'];

}
