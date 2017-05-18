<?php

namespace Maghead\Laravel\Console\Commands;

class VersionCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $signature = 'maghead:version';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('version');
    }
}
