<?php

namespace Maghead\Laravel\Console\Commands;

class IndexCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $name = 'maghead:index';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('index');
    }
}
