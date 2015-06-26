<?php

namespace Jampot5000\Calibre\Repositories\Interfaces;

interface BookRepository
{
    /**
     * @param $id
     * @param array $columns
     * @param array $with
     * @return \Jampot5000\Calibre\Models\Interfaces\Book
     */
    public function findById($id, array $columns = ['*'], array $with = []);

    /**
     * @param $name
     * @param array $columns
     * @param array $with
     * @return \Jampot5000\Calibre\Models\Interfaces\Book
     */
    public function findByTitle($name, array $columns = ['*'], array $with = []);

    /**
     * @param $name
     * @param array $columns
     * @param array $with
     * @return \Jampot5000\Calibre\Models\Interfaces\Book
     */
    public function findBySort($name, array $columns = ['*'], array $with = []);

    /**
     * @param array $array
     * @param array $columns
     * @param array $with
     * @return \Jampot5000\Calibre\Models\Interfaces\Book
     */
    public function findBy(array $array, array $columns = ['*'], array $with = []);

    /**
     * @param array $columns
     * @param array $with
     * @return array
     */
    public function all(array $columns = ['*'], array $with = []);
}
