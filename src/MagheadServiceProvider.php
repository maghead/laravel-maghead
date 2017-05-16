<?php

namespace Maghead\Laravel;

use Maghead\Runtime\Bootstrap;
use Illuminate\Support\ServiceProvider;
use Maghead\Runtime\Config\ArrayConfigLoader;

class MagheadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Bootstrap::setup(

      );
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
