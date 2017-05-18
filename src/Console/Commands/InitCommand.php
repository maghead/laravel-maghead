<?php

namespace Maghead\Laravel\Console\Commands;

class InitCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $name = 'maghead:init';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('init');
    }
}
