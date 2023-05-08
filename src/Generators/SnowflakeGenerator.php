<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Generators;

use Godruoyi\Snowflake\Snowflake;
use Rawilk\HumanKeys\Contracts\Generator;

class SnowflakeGenerator implements Generator
{
    public function generate(?string $prefix = null): string
    {
        return implode('_', [
            $prefix,
            (new Snowflake)->id(),
        ]);
    }
}
