<?php

namespace Maghead\Laravel\Console\Commands;

class ShardCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $name = 'maghead:shard';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('shard');
    }
}
