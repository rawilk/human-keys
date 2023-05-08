<?php

namespace Rawilk\HumanKeys\Tests;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Orchestra\Testbench\TestCase as Orchestra;
use Rawilk\HumanKeys\HumanKeysServiceProvider;

class TestCase extends Orchestra
{
    use LazilyRefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [
            HumanKeysServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $migration = include __DIR__ . '/Fixture/migrations/create_test_tables.php';
        (new $migration)->up();
    }
}
