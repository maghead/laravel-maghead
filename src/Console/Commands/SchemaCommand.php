<?php

namespace Maghead\Laravel\Console\Commands;

class SchemaCommand extends MagheadCommand
{
    /**
     * @var string
     */
    protected $name = 'maghead:schema';

    /**
     * fire.
     */
    public function fire()
    {
        $this->maghead('schema');
    }
}
