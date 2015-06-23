<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Calibre Path
    |--------------------------------------------------------------------------
    |
    | This should be the full path to the root calibre library folder.
    */

    'path' => env('CALIBRE_PATH', '..\testLibrary'),

    /*
    |--------------------------------------------------------------------------
    | Calibre DB File
    |--------------------------------------------------------------------------
    |
    | This is the actual database file, I'm not currently sure if this can be changed.
    | but it can stay here for the time being just incase.
    */
    'db'   => env('CALIBRE_DB', 'metadata.db'),

    /*
    |--------------------------------------------------------------------------
    | Register Route
    |--------------------------------------------------------------------------
    |
    | Should the package register the download route?
    |
    */
    'registerRoute' => env('registerRoute','true'),

    /*
    |--------------------------------------------------------------------------
    | Download Route URL
    |--------------------------------------------------------------------------
    |
    | It is required to have {id} and {format}
    |
    */
    'route' => env('CALIBRE_DOWNLOAD_ROUTE', 'books/{id}/{format}'),

];
