<?php

namespace Jampot5000\Calibre\Tests;

use Illuminate\Database\Capsule\Manager as Capsule;

abstract class TestBase extends \PHPUnit_Framework_TestCase
{
    private function setupDB()
    {
        $config = include __DIR__ . '/../src/config.php';
        $capsule = new Capsule;

        $connection = [
            'driver'   => 'sqlite',
            'database' => realpath(__DIR__.'/'. $config['path'] . '/' . $config['db']),

        ];


        $capsule->addConnection($connection, 'calibre');

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
    public function setUp()
    {
        $this->setupDB();
    }
}
