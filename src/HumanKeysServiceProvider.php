<?php

namespace Rawilk\HumanKeys;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rawilk\HumanKeys\Commands\HumanKeysCommand;

class HumanKeysServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('human-keys')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_human-keys_table')
            ->hasCommand(HumanKeysCommand::class);
    }
}
