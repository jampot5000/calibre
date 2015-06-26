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


    public function bindInterface()
    {
        $this->app->bind('Jampot5000\Calibre\Config\CalibreConfig', 'Jampot5000\Calibre\Config\LaravelCalibreConfig');
        $this->app->bind(
            'Jampot5000\Calibre\Repositories\Interfaces\AuthorRepository',
            'Jampot5000\Calibre\Repositories\Eloquent\AuthorRepository'
        );
        $this->app->bind(
            'Jampot5000\Calibre\Repositories\Interfaces\BookRepository',
            'Jampot5000\Calibre\Repositories\Eloquent\BookRepository'
        );
    }

    public function bindRepositories()
    {
        $this->app->bind('Jampot5000\Calibre\Repositories\Eloquent\AuthorRepository', function ($app) {
            return $app['CalibreInterface']->getAuthorRepository();
        });
        $this->app->bind('Jampot5000\Calibre\Repositories\Eloquent\BookRepository', function ($app) {
            return $app['CalibreInterface']->getBookRepository();
        });
    }

    public function register()
    {
        $this->bindInterface();

        $this->app->bind('Jampot5000\Calibre\Config\LaravelCalibreConfig', function () {
            return new LaravelCalibreConfig($this->app->config['calibre']);
        });

        $this->app->instance(
            'CalibreInterface',
            new CalibreInterface(new LaravelCalibreConfig($this->app->config['calibre']))
        );

        $this->bindRepositories();
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
