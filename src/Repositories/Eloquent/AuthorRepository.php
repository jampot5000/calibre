<?php

namespace Jampot5000\Calibre\Repositories\Eloquent;

use Jampot5000\Calibre\Models\Author;
use Jampot5000\Calibre\Repositories\Interfaces\AuthorRepository as BaseAuthorRepository;

class AuthorRepository implements BaseAuthorRepository
{
    public function findById($id, array $columns = ['*'])
    {
        return $this->findBy(['id' => $id], $columns);
    }

    public function findByName($name, array $columns = ['*'])
    {
        return $this->findBy(['name' => $name], $columns);
    }

    public function findBySort($name, array $columns = ['*'])
    {
        return $this->findBy(['sort' => $name], $columns);
    }

    public function findBy(array $array, array $columns = ['*'])
    {
        return Author::select($columns)->where($array)->get()->first();
    }

    public function all(array $columns = ['*'])
    {
        return Author::select($columns)->get();
    }
}
