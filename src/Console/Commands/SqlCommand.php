<?php

namespace Maghead\Laravel\Console\Commands;

class SqlCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $signature = 'maghead:sql';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('sql');
    }
}
