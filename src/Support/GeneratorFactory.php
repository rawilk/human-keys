<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Support;

use Rawilk\HumanKeys\Contracts\Generator;
use Rawilk\HumanKeys\Exceptions\InvalidGenerator;
use Rawilk\HumanKeys\Generators\KsuidGenerator;
use Rawilk\HumanKeys\Generators\SnowflakeGenerator;
use Rawilk\HumanKeys\Generators\UuidGenerator;

class GeneratorFactory
{
    public function __construct(protected string $generator) {}

    public static function make(string $generator): self
    {
        return new static($generator);
    }

    public function generator(): Generator
    {
        return match ($this->generator) {
            'ksuid' => new KsuidGenerator,
            'snowflake' => new SnowflakeGenerator,
            'uuid' => new UuidGenerator,
            default => $this->makeCustomGenerator($this->generator),
        };
    }

    protected function makeCustomGenerator(string $generator): Generator
    {
        throw_unless(
            class_exists($generator) && in_array(Generator::class, class_implements($generator), true),
            InvalidGenerator::invalid($generator)
        );

        return new $generator;
    }
}
