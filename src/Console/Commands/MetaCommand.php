<?php

namespace Maghead\Laravel\Console\Commands;

class MetaCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $name = 'maghead:meta';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('meta');
    }
}
