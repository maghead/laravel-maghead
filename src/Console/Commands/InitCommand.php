<?php

namespace Maghead\Laravel\Console\Commands;

class InitCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'maghead:init';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->maghead('init');
    }
}
