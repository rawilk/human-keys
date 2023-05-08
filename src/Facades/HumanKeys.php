<?php

namespace Rawilk\HumanKeys\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rawilk\HumanKeys\HumanKeys
 */
class HumanKeys extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Rawilk\HumanKeys\HumanKeys::class;
    }
}
