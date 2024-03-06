<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Rawilk\HumanKeys\HumanKeysServiceProvider;
use Rawilk\HumanKeys\Tests\Fixture\Migrations\CreateTestTables;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        (new CreateTestTables)->up();
    }

    protected function getPackageProviders($app): array
    {
        return [
            HumanKeysServiceProvider::class,
        ];
    }
}
