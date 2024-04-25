<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksCategory extends Model
{
    use HasFactory;

    protected $table = 'books_categories';

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
