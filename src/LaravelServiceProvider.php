<?php

namespace Jampot5000\Calibre;

use Illuminate\Support\ServiceProvider;
use Jampot5000\Calibre\Config\LaravelCalibreConfig;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->setupConfig();
        $this->addDatabaseConnection();
        if (!$this->app->routesAreCached()) {
            include __DIR__ . '/routes.php';
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
                return new CalibreInterface(new LaravelCalibreConfig($app->config['calibre']));
            }
        );
    }

    private function setupConfig()
    {
        $this->publishes(
            [
                __DIR__ . '/Config.php' => config_path('calibre.php'),
            ]
        );
        $this->mergeConfigFrom(realpath(__DIR__ . './Config.php'), 'calibre');
    }
}
