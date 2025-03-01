<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = ['name'];


    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
