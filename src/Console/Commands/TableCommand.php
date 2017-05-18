<?php

namespace Maghead\Laravel\Console\Commands;

class TableCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $signature = 'maghead:table';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('table');
    }
}
