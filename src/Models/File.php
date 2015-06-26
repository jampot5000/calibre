<?php
namespace Jampot5000\Calibre\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $connection = 'calibre';
    protected $table = 'data';
    protected $appends = ["path"];
    protected $hidden = ["path","pivot"];


    public function book()
    {
        return $this->belongsTo('Jampot5000\Calibre\Models\Book', 'book');
    }

    public function getPathAttribute()
    {
        return realpath(app()->config['calibre']['path']
            . '/' . $this->book()->first()->path
            . "/" . $this->name . '.' . $this->format);
    }
}
