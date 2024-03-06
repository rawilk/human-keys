<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Generators;

use Rawilk\HumanKeys\Contracts\Generator;
use Tuupola\KsuidFactory as Ksuid;

class KsuidGenerator implements Generator
{
    public function generate(?string $prefix = null): string
    {
        return implode('_', [
            $prefix,
            Ksuid::create()->string(),
        ]);
    }
}
