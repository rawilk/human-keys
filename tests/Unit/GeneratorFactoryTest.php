<?php

declare(strict_types=1);

use Rawilk\HumanKeys\Contracts\Generator as GeneratorContract;
use Rawilk\HumanKeys\Exceptions\InvalidGenerator;
use Rawilk\HumanKeys\Support\GeneratorFactory;

it('throws an exception when an invalid generator is provided', function (mixed $generator) {
    GeneratorFactory::make(is_object($generator) ? $generator::class : $generator)->generator();
})->with([
    'foo',
    new class
    {
    },
])->expectException(InvalidGenerator::class);

test('custom generators can be used', function () {
    $generator = new class implements GeneratorContract
    {
        public function generate(?string $prefix = null): string
        {
            return "{$prefix}_foo";
        }
    };

    $id = GeneratorFactory::make($generator::class)->generator()->generate('bar');

    expect($id)->toBe('bar_foo');
});
