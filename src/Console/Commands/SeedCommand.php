<?php

namespace Maghead\Laravel\Console\Commands;

class SeedCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $signature = 'maghead:seed';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('seed');
    }
}
