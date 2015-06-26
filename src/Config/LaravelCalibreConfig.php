<?php

namespace Jampot5000\Calibre\Config;

use Jampot5000\Calibre\Repositories\Eloquent\AuthorRepository;
use Jampot5000\Calibre\Repositories\Eloquent\BookRepository;
use Illuminate\Support\Facades\Config;

class LaravelCalibreConfig implements CalibreConfig
{
    private $path;
    private $database;

    public function __construct(array $config)
    {
        $this->path = $config['path'];
        $this->database = $config['db'];
    }

    public function boot()
    {
        $this->addDatabaseConnection();
    }

    public function getAuthorRepository()
    {
        return new AuthorRepository();
    }

    public function getBookRepository()
    {
        return new BookRepository();
    }

    public function getSeriesRepository()
    {
    }

    public function addDatabaseConnection()
    {
        $connection = [
            'driver' => 'sqlite',
            'database' => realpath($this->path . '\\' . $this->database),
            'prefix' => '',
        ];
        Config::set('database.connections.calibre', $connection);
    }
}
