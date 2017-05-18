<?php

namespace Maghead\Laravel\Console\Commands;

class SeedCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $name = 'maghead:seed';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('seed');
    }
}
