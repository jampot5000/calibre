<?php

namespace Jampot5000\Calibre\Models\Interfaces;

interface Book
{
    public function getId();

    public function getTitle();

    public function getSort();

    public function getSeriesIndex();

    public function getISBN();

    public function getPath();

    public function getHasCover();

    public function getAuthors();

    public function getFiles();

    public function getSeries();
}
