<?php

namespace Maghead\Laravel\Console\Commands;

class DiffCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $name = 'maghead:diff';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('diff');
    }
}
