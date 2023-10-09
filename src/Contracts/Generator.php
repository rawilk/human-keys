<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Contracts;

interface Generator
{
    public function generate(string $prefix = null): string;
}
