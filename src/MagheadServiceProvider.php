<?php

namespace Maghead\Laravel;

use Maghead\Runtime\Bootstrap;
use Illuminate\Support\ServiceProvider;
use Maghead\Runtime\Config\ArrayConfigLoader;

class MagheadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Bootstrap::setup($this->app['maghead.config']);

        if ($this->app->runningInConsole() === true) {
            $this->publishes([__DIR__.'/../config/maghead.php' => config_path('maghead.php')], 'config');
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/maghead.php', 'maghead');

        $this->app->singleton('maghead.config', function ($app) {
            return ArrayConfigLoader::load(
                $app['config']['maghead']
            );
        });
    }
}
