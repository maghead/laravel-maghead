<?php

namespace Maghead\Laravel\Console\Commands;

class IndexCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $signature = 'maghead:index';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('index');
    }
}
