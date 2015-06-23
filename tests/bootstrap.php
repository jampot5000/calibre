<?php

    require __DIR__.'/../vendor/autoload.php';

    /*
     * Just to replace the env funtion
     */
    function env($keyword, $default)
    {
        return $default;
    }
    /*
     * Load in the config
     */






setupDB();
use Jampot5000\Calibre\Models\Author;

dd(Author::All());

