<?php

namespace Maghead\Laravel\Tests;

use PHPUnit\Framework\TestCase;
use Mockery as m;
use Maghead\Laravel\MagheadServiceProvider;

class MagheadServiceProviderTest extends TestCase
{
    protected function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function testRegister()
    {
        $serviceProvider = new MagheadServiceProvider(
          $app = m::mock('Illuminate\Contracts\Foundation\Application, ArrayAccess')
        );

        $serviceProvider->register();
    }
}
