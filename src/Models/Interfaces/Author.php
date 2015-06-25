<?php

namespace Jampot5000\Calibre\Models\Interfaces;

interface Author
{
    public function getId();

    public function getName();

    public function getSort();

    public function getLink();

    public function getBooks();

    public function toArray();
}
