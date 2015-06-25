<?php

namespace Jampot5000\Calibre\Repositories\Interfaces;

interface BookRepository
{
    /**
     * @param $id
     * @param array $columns
     * @return \Jampot5000\Calibre\Models\Interfaces\Book
     */
    public function findById($id, array $columns = ['*']);

    /**
     * @param $name
     * @param array $columns
     * @return \Jampot5000\Calibre\Models\Interfaces\Book
     */
    public function findByTitle($name, array $columns = ['*']);

    /**
     * @param $name
     * @param array $columns
     * @return \Jampot5000\Calibre\Models\Interfaces\Book
     */
    public function findBySort($name, array $columns = ['*']);

    /**
     * @param array $array
     * @param array $columns
     * @return \Jampot5000\Calibre\Models\Interfaces\Book
     */
    public function findBy(array $array, array $columns = ['*']);

    /**
     * @param array $columns
     * @return array
     */
    public function all(array $columns = ['*']);
}
