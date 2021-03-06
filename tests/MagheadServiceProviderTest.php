<?php

namespace Maghead\Laravel\Tests;

use Mockery as m;
use Maghead\Runtime\Bootstrap;
use PHPUnit\Framework\TestCase;
use Maghead\Runtime\Config\Config;
use Illuminate\Container\Container;
use Maghead\Laravel\Console\Application;
use Maghead\Laravel\MagheadServiceProvider;
use Maghead\Runtime\Config\ArrayConfigLoader;

class MagheadServiceProviderTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        if (class_exists(Container::class) === true) {
            $container = m::mock(new Container);
            $container->instance('path', __DIR__);
            $container->instance('path.config', __DIR__);
            $container->shouldReceive('basePath')->andReturn(__DIR__);
            $container->shouldReceive('databasePath')->andReturn(__DIR__);
            Container::setInstance($container);
        }
    }

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
                    'maghead' => [
                        'instance' => [],
                    ],
                ],
            ]) instanceof Config;
        }));

        $app->shouldReceive('singleton')->once()->with('Maghead\Laravel\Console\Application', m::on(function ($closure) {
            return $closure([
                'maghead.config' => m::mock('Maghead\Runtime\Config\Config'),
            ]) instanceof Application;
        }));

        $this->assertNull($serviceProvider->register());
    }

    public function testBoot()
    {
        $serviceProvider = new MagheadServiceProvider(
            $app = m::mock('Illuminate\Contracts\Foundation\Application, ArrayAccess')
        );

        $app->shouldReceive('offsetGet')->once()->with('maghead.config')->andReturn(
            ArrayConfigLoader::load($magheadConfig = [
                'databases' => [
                    'master' => [
                        'dsn' => 'mysql:host=localhost;dbname=testing',
                        'user' => 'root',
                        'password' => 'root',
                    ],
                ],
            ])
        );

        $app->shouldReceive('runningInConsole')->once()->andReturn(true);

        $serviceProvider->boot();

        $config = Bootstrap::getConfig();
        $this->assertSame($config['databases']['master']['dsn'], $magheadConfig['databases']['master']['dsn']);
        $this->assertSame($config['databases']['master']['user'], $magheadConfig['databases']['master']['user']);
        $this->assertSame($config['databases']['master']['password'], $magheadConfig['databases']['master']['password']);
    }
}
