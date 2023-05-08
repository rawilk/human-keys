<?php

namespace Rawilk\HumanKeys\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rawilk\HumanKeys\HumanKeys
 *
 * @method static string generate(?string $prefix = null)
 */
class HumanKeys extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Rawilk\HumanKeys\Contracts\HumanKeys::class;
    }
}
