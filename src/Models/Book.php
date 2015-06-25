<?php
namespace Jampot5000\Calibre\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Jampot5000\Calibre\Models\Interfaces\Book as BaseBook;

class Book extends Model implements BaseBook
{
    protected $connection = 'calibre';
    protected $table = 'books';

    public function authors()
    {
        return $this->belongsToMany('Jampot5000\Calibre\Models\Author', 'books_authors_link', 'book', 'author');
    }

    public function files()
    {
        return $this->hasMany('Jampot5000\Calibre\Models\File', 'book');
    }

    public function series()
    {
        return $this->belongsToMany('Jampot5000\Calibre\Models\Series', 'books_series_link', 'book', 'series');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function getSeriesIndex()
    {
        return $this->series_index;
    }

    public function getISBN()
    {
        return $this->isbn;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getHasCover()
    {
        return $this->has_cover;
    }

    public function getAuthors()
    {
        return $this->getRelationAsArray($this->authors()->get());
    }

    public function getFiles()
    {
        return $this->getRelationAsArray($this->files()->get());
    }

    public function getSeries()
    {
        return $this->getRelationAsArray($this->series()->get());
    }

    private function getRelationAsArray(Collection $relation)
    {
        $collectionArray = [];
        foreach ($relation as $segment) {
            $collectionArray[] = $segment;
        }

        return $collectionArray;
    }
}
