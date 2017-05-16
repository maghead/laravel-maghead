<?php

namespace Maghead\Laravel\Console\Commands;

use Maghead\Console\Application;
use Illuminate\Console\Command as BaseCommand;

abstract class Command extends BaseCommand
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * __construct.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct();
        $this->app = $app;
    }

    /**
     * maghead.
     *
     * @param mixed $argv
     */
    protected function maghead($argv)
    {
        $argv = is_string($argv) === true ? explode(' ', $argv) : $argv;
        $this->app->run($argv);
    }
}
