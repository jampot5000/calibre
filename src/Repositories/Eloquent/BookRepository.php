<?php

namespace Jampot5000\Calibre\Repositories\Eloquent;

use Jampot5000\Calibre\Models\Book;
use Jampot5000\Calibre\Repositories\Interfaces\BookRepository as BaseBookRepository;

class BookRepository implements BaseBookRepository
{
    public function findById($id, array $columns = ['*'])
    {
        return $this->findBy(['id' => $id], $columns);
    }

    public function findByTitle($name, array $columns = ['*'])
    {
        return $this->findBy(['title' => $name], $columns);
    }

    public function findBySort($name, array $columns = ['*'])
    {
        return $this->findBy(['sort' => $name], $columns);
    }

    public function findBy(array $array, array $columns = ['*'])
    {
        return Book::select($columns)->where($array)->get()->first();
    }

    public function all(array $columns = ['*'])
    {
        $books = [];
        foreach (Book::select($columns)->get() as $book) {
            $books[] = $book;
        }
        return $books;
    }
}
