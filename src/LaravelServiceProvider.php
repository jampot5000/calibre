<?php

namespace Jampot5000\Calibre;

use Illuminate\Support\ServiceProvider;
use Jampot5000\Calibre\Config\LaravelCalibreConfig;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->setupConfig();
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
        $this->app->instance('CalibreInterface',new CalibreInterface(new LaravelCalibreConfig($this->app->config['calibre'])));
    }

    private function setupConfig()
    {
        $this->publishes(
            [
                __DIR__ . '/config/config.php' => config_path('calibre.php'),
            ]
        );
        $this->mergeConfigFrom(realpath(__DIR__ . '/config/config.php'), 'calibre');
    }
}
