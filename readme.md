#PHP Calibre

PHP Calibre is an interface between laravel and calibre, exposing models for the Author, Book and Files for the books.

### Version
0.0.1 - Just getting the basics down at the moment.

### Installation
Install with composer

    composer require 'jampot5000/calibre':'0.0.1'
Add the Laravel service provider in config/app.php

    Jampot5000\Calibre\LaravelServiceProvider::class,

Models can be accessed using:
    
    \Jampot5000\Calibre\Models\Author
    \Jampot5000\Calibre\Models\Book
    \Jampot5000\Calibre\Models\File

    
###Todo
* Add series Model
* Move route logic into a class allowing finer control of obtaining a file.
* Update readme with better documentation
* Add testing
* Abstract away from using eloquent as it is alot to pull in for people not using laravel