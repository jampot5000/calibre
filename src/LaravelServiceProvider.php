<?php

namespace Jampot5000\Calibre;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->setupConfig();
        $this->addDatabaseConnection();
        if (!$this->app->routesAreCached()) {
            include __DIR__.'/routes.php';
        }
    }


    /**
     * Register the service provider.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton(
            'CalibreInterface',
            function ($app) {
                return new CalibreInterface($app->config['calibre']);
            }
        );
    }

    private function setupConfig()
    {
        $this->publishes(
            [
            __DIR__.'/config.php' => config_path('calibre.php'),
            ]
        );
        $this->mergeConfigFrom(realpath(__DIR__.'./config.php'), 'calibre');
    }

    private function addDatabaseConnection()
    {
        $connection = [
                        'driver'   => 'sqlite',
                        'database' => config('calibre.path') . '\\' . config('calibre.db'),
                        'prefix'   => '',
        ];
        $this->app->make('config')->set('database.connections.calibre', $connection);
    }
}
