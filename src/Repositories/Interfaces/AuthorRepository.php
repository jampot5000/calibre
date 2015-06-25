<?php

namespace Jampot5000\Calibre\Repositories\Interfaces;

interface AuthorRepository
{
    /**
     * @return \Jampot5000\Calibre\Models\Interfaces\Author
     */
    public function findById($id);

    /**
     * @return \Jampot5000\Calibre\Models\Interfaces\Author
     */
    public function findByName($name);

    /**
     * @return \Jampot5000\Calibre\Models\Interfaces\Author
     */
    public function findBySort($name);

    /**
     * @return \Jampot5000\Calibre\Models\Interfaces\Author
     */
    public function findBy(array $array);
}
