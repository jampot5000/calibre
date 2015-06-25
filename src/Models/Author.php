<?php
namespace Jampot5000\Calibre\Models;

use Illuminate\Database\Eloquent\Model;
use Jampot5000\Calibre\Models\Interfaces\Author as AuthorBase;

class Author extends Model implements AuthorBase
{
    protected $connection = 'calibre';
    protected $table = 'authors';

    public function books()
    {
        return $this->belongsToMany('Jampot5000\Calibre\Models\Book', 'books_authors_link', 'author', 'book');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getBooks()
    {
        $books = [];

        foreach ($this->books()->get() as $book) {
            $books[] = $book;
        }

        return $books;
    }
}
