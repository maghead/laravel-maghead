<?php

namespace Maghead\Laravel\Console\Commands;

class DbCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $signature = 'maghead:db';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('db');
    }
}
