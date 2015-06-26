<?php

namespace Jampot5000\Calibre\Repositories\Eloquent;

use Jampot5000\Calibre\Models\Book;
use Jampot5000\Calibre\Repositories\Interfaces\BookRepository as BaseBookRepository;

class BookRepository implements BaseBookRepository
{
    public function findById($id, array $columns = ['*'], array $with = [])
    {
        return $this->findBy(['id' => $id], $columns);
    }

    public function findByTitle($name, array $columns = ['*'], array $with = [])
    {
        return $this->findBy(['title' => $name], $columns);
    }

    public function findBySort($name, array $columns = ['*'], array $with = [])
    {
        return $this->findBy(['sort' => $name], $columns);
    }

    public function findBy(array $array, array $columns = ['*'], array $with = [])
    {
        return Book::select($columns)->where($array)->get()->first();
    }

    public function all(array $columns = ['*'], array $with = [])
    {
        $books = [];
        foreach (Book::select($columns)->get() as $book) {
            $books[] = $book;
        }
        return $books;
    }
}
