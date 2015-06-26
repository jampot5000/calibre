<?php
/**
 * Created by PhpStorm.
 * User: emi
 * Date: 24/06/2015
 * Time: 18:27
 */

namespace Jampot5000\Calibre\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $hidden = ["pivot"];

    public function series()
    {
        return $this->belongsToMany('Jampot5000\Calibre\Models\Book', 'books_series_link', 'series', 'book');
    }
}
