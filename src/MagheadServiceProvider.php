<?php

namespace Maghead\Laravel;

use Maghead\Runtime\Bootstrap;
use Illuminate\Support\ServiceProvider;
use Maghead\Laravel\Console\Application;
use Maghead\Runtime\Config\ArrayConfigLoader;
use Maghead\Laravel\Console\Commands\DbCommand;
use Maghead\Laravel\Console\Commands\SqlCommand;
use Maghead\Laravel\Console\Commands\DiffCommand;
use Maghead\Laravel\Console\Commands\InitCommand;
use Maghead\Laravel\Console\Commands\MetaCommand;
use Maghead\Laravel\Console\Commands\SeedCommand;
use Maghead\Laravel\Console\Commands\IndexCommand;
use Maghead\Laravel\Console\Commands\ShardCommand;
use Maghead\Laravel\Console\Commands\TableCommand;
use Maghead\Laravel\Console\Commands\SchemaCommand;
use Maghead\Laravel\Console\Commands\MagheadCommand;
use Maghead\Laravel\Console\Commands\MigrateCommand;
use Maghead\Laravel\Console\Commands\VersionCommand;

class MagheadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Bootstrap::setup($this->app['maghead.config']);

        if ($this->app->runningInConsole() === true) {
            $this->publishes([__DIR__.'/../config/maghead.php' => config_path('maghead.php')], 'config');

            $this->commands([
                DbCommand::class,
                DiffCommand::class,
                IndexCommand::class,
                InitCommand::class,
                MagheadCommand::class,
                MetaCommand::class,
                MigrateCommand::class,
                SchemaCommand::class,
                SeedCommand::class,
                ShardCommand::class,
                SqlCommand::class,
                TableCommand::class,
                VersionCommand::class,
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
