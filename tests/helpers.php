<?php

if (! function_exists('env')) {
    function env($keyword, $default)
    {
        return $default;
    }
}

function setupDB()
{
    $config = include __DIR__ . '/../src/config.php';
    $capsule = new Illuminate\Database\Capsule\Manager;

    $connection = [
        'driver'   => 'sqlite',
        'database' => realpath(__DIR__.'/'. $config['path'] . '/' . $config['db']),

    ];

    $capsule->addConnection($connection, 'calibre');
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
}
