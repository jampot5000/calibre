<?php

namespace Jampot5000\Calibre\Tests;

use Illuminate\Database\Capsule\Manager;
use Jampot5000\Calibre\Config\CalibreConfig;
use Jampot5000\Calibre\Repositories\Eloquent\AuthorRepository;
use Jampot5000\Calibre\Repositories\Eloquent\BookRepository;

class TestingCalibreConfig implements CalibreConfig
{

    private $config;
    public function __construct()
    {
        $this->config = include __DIR__ . '/../src/config/config.php';
        //parent::__construct($config);
    }

    protected function addDatabaseConnection()
    {

        $capsule = new Manager;

        $connection = [
            'driver'   => 'sqlite',
            'database' => realpath(__DIR__.'/'. $this->config['path'] . '/' . $this->config['db']),

        ];

        $capsule->addConnection($connection, 'calibre');
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
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
        return null;
    }

    public function getSeriesRepository()
    {
        // TODO: Implement getSeriesRepository() method.
    }
}
