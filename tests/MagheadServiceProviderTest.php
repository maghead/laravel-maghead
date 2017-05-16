<?php

namespace Maghead\Laravel\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Maghead\Runtime\Config\Config;
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

        $app->shouldReceive('offsetGet')->twice()->with('config')->andReturn(
        $config = m::mock('stdClass')
      );
        $config->shouldReceive('get')->once()->with('maghead', [])->andReturn([]);
        $config->shouldReceive('set')->once()->with('maghead', m::type('array'));

        $app->shouldReceive('singleton')->once()->with('maghead.config', m::on(function ($closure) {
            return $closure([
          'config' => [
            'maghead' => [],
          ],
        ]) instanceof Config;
        }));

        $serviceProvider->register();
    }
}
