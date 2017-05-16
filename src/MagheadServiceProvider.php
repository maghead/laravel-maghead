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
        ArrayConfigLoader::load(
          $this->app['config']['maghead']
        )
      );
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/maghead.php', 'maghead');
    }
}
