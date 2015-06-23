<?php
namespace Jampot5000\Calibre\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $connection = 'calibre';
    protected $table = 'authors';

    public function books()
    {
        return $this->belongsToMany('Jampot5000\Calibre\Models\Book', 'books_authors_link', 'author', 'book');
    }
}
