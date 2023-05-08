<?php

namespace Rawilk\HumanKeys;

use Rawilk\HumanKeys\Contracts\HumanKeys as HumanKeysContract;
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

    public function packageBooted(): void
    {
        $this->app->singleton(HumanKeysContract::class, function () {
            $generator = config('human-keys.generator');

            return new HumanKeys($generator);
        });
    }
}
