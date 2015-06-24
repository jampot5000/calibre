<?php
namespace Jampot5000\Calibre\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $connection = 'calibre';
    protected $table = 'books';

    public function authors()
    {
        return $this->belongsToMany('Jampot5000\Calibre\Models\Author', 'books_authors_link', 'book', 'author');
    }

    public function files()
    {
        return $this->hasMany('Jampot5000\Calibre\Models\File', 'book');
    }

    public function series()
    {
        return $this->belongsToMany('Jampot5000\Calibre\Models\Series', 'books_series_link', 'book', 'series');
    }
}
