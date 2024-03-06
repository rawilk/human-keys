<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Generators;

use Illuminate\Support\Str;
use Rawilk\HumanKeys\Contracts\Generator;

class UuidGenerator implements Generator
{
    public function generate(?string $prefix = null): string
    {
        return implode('_', [
            $prefix,
            str_replace('-', '', Str::uuid()),
        ]);
    }
}
