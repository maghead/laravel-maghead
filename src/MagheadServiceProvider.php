<?php

namespace Maghead\Laravel;

use Maghead\Runtime\Bootstrap;
use Illuminate\Support\ServiceProvider;
use Maghead\Laravel\Console\Application;
use Maghead\Runtime\Config\ArrayConfigLoader;
use Maghead\Laravel\Console\Commands\MagheadCommand;

class MagheadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Bootstrap::setup($this->app['maghead.config']);

        if ($this->app->runningInConsole() === true) {
            $this->publishes([__DIR__.'/../config/maghead.php' => config_path('maghead.php')], 'config');

            $this->commands([
                MagheadCommand::class,
            ]);
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

        $this->app->singleton(Application::class, function ($app) {
            return new Application(null, null, $app['maghead.config']);
        });
    }
}
