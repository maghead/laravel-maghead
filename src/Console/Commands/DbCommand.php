<?php

namespace Maghead\Laravel\Console\Commands;

class DbCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $name = 'maghead:db';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('db');
    }
}
