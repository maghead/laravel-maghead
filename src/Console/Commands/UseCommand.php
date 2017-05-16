<?php

namespace Maghead\Laravel\Console\Commands;

class UseCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'maghead:use {path}';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->maghead('use '.$this->argument('path'));
    }
}
