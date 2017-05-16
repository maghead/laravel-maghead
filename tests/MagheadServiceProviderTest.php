<?php

namespace Maghead\Laravel\Tests;

use Mockery as m;
use Maghead\Runtime\Bootstrap;
use PHPUnit\Framework\TestCase;
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
      );
    }

    // public function testBoot()
    // {
    //     $serviceProvider = new MagheadServiceProvider(
    //       $app = [
    //         'config' => [
    //           'maghead' => [
    //             'databases' => [
    //                'master' => [
    //                    'dsn' => 'mysql:host=localhost;dbname=testing',
    //                    'user' => 'root',
    //                ],
    //            ],
    //           ],
    //         ],
    //       ]
    //     );
    //
    //     $serviceProvider->boot();
    //
    //     $config = Bootstrap::getConfig()->getArrayCopy();
    //
    //     $this->assertSame(
    //       $config['databases']['master']['dsn'],
    //       $app['config']['maghead']['databases']['master']['dsn']
    //     );
    //
    //     $this->assertSame(
    //       $config['databases']['master']['user'],
    //       $app['config']['maghead']['databases']['master']['user']
    //     );
    // }
}
