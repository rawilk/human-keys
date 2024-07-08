<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys;

use Rawilk\HumanKeys\Contracts\HumanKeys as HumanKeysContract;
use Rawilk\HumanKeys\Support\GeneratorFactory;

class HumanKeys implements HumanKeysContract
{
    public function __construct(protected string $generator) {}

    public function generate(?string $prefix = null): string
    {
        return GeneratorFactory::make($this->generator)->generator()->generate($prefix);
    }
}
