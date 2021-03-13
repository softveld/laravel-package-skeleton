<?php

namespace Softveld\Skeleton\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Softveld\Skeleton\SkeletonServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            SkeletonServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Remove if you a MySQl database is used
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
        include_once __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
        (new \CreatePackageTable())->up();
        */

      // perform environment setup
    }
}
