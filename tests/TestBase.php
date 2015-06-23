<?php
use Illuminate\Database\Capsule\Manager as Capsule;
function env($keyword, $default)
{
    return $default;
}
abstract class TestBase extends PHPUnit_Framework_TestCase {
    private function setupDB($config){
        $config = require __DIR__ . '/../src/config.php';
        $capsule = new Capsule;

        $connection = [
            'driver'   => 'sqlite',
            'database' => realpath(__DIR__.'\\'. $config['path'] . '\\' . $config['db']),

        ];

        echo __DIR__. '\\'. $config['path'] . '\\' . $config['db'];
        $capsule->addConnection($connection,'calibre');

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
    public function setUp()
    {
        $config = [
            'path' => '..\\testLibrary',
            'db'   => 'metadata.db'
        ];

        $this->setupDB($config);
    }

}