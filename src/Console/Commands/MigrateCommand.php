<?php

namespace Maghead\Laravel\Console\Commands;

class MigrateCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $signature = 'maghead:migrate';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('migrate');
    }
}
