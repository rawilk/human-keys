<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Exceptions;

use InvalidArgumentException;
use Rawilk\HumanKeys\Contracts\Generator;

class InvalidGenerator extends InvalidArgumentException
{
    public static function invalid(string $generator): self
    {
        return new static(
            "The generator [{$generator}] is invalid. Generator must implement the " . Generator::class . ' interface.'
        );
    }
}
