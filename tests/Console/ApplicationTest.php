<?php

namespace Maghead\Laravel\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Maghead\Laravel\Console\Application;
use Maghead\Runtime\Config\ArrayConfigLoader;

class ApplicationTest extends TestCase
{
    protected function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function testLoadConfig()
    {
        $application = new Application(
            null,
            null,
            $config = ArrayConfigLoader::load([])
        );

        $this->assertSame($config, $application->loadConfig());
    }
}
