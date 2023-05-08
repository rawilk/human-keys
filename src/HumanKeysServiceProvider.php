<?php

namespace Rawilk\HumanKeys;

use Rawilk\HumanKeys\Commands\HumanKeysCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HumanKeysServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('human-keys')
            ->hasConfigFile();
    }
}
