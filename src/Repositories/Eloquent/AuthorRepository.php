<?php

namespace Jampot5000\Calibre\Repositories\Eloquent;

use Jampot5000\Calibre\Models\Author;
use Jampot5000\Calibre\Repositories\Interfaces\AuthorRepository as BaseAuthorRepository;

class AuthorRepository implements BaseAuthorRepository
{
    public function findById($id, array $columns = ['*'], array $with = [])
    {
        return $this->findBy(['id' => $id], $columns);
    }

    public function findByName($name, array $columns = ['*'], array $with = [])
    {
        return $this->findBy(['name' => $name], $columns);
    }

    public function findBySort($name, array $columns = ['*'], array $with = [])
    {
        return $this->findBy(['sort' => $name], $columns);
    }

    public function findBy(array $array, array $columns = ['*'], array $with = [])
    {
        return Author::select($columns)->where($array)->get()->first();
    }

    public function all(array $columns = ['*'], array $with = [])
    {
        $authors = [];
        foreach (Author::select($columns)->get() as $author) {
            $authors[] = $author;
        }
        return $authors;
    }
}
