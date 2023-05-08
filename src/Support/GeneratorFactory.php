<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Support;

use Rawilk\HumanKeys\Contracts\Generator;
use Rawilk\HumanKeys\Exceptions\InvalidGenerator;
use Rawilk\HumanKeys\Generators\KsuidGenerator;
use Rawilk\HumanKeys\Generators\SnowflakeGenerator;

class GeneratorFactory
{
    public function __construct(protected string $generator)
    {
    }

    public static function make(string $generator): self
    {
        return new static($generator);
    }

    public function generator(): Generator
    {
        if (class_exists($this->generator) && in_array(Generator::class, class_implements($this->generator), true)) {
            return new $this->generator;
        }

        return match ($this->generator) {
            'ksuid' => new KsuidGenerator,
            'snowflake' => new SnowflakeGenerator,
            default => throw InvalidGenerator::invalid($this->generator),
        };
    }
}
