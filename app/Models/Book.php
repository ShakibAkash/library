<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'publisher', 'slug', 'description', 'cover_url',
        'genre', 'pages', 'year', 'isbn', 'rating', 'status', 'notes', 'review',
    ];
}
