<?php

declare(strict_types=1);

it('will not use debugging functions')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'ddd'])
    ->each->not->toBeUsed();

test('strict types are used')
    ->expect('Rawilk\HumanKeys')
    ->toUseStrictTypes();

test('strict types are used in tests')
    ->expect('Rawilk\HumanKeys\Tests')
    ->toUseStrictTypes();

test('only interfaces are put in the Contracts directory')
    ->expect('Rawilk\HumanKeys\Contracts')
    ->toBeInterfaces();

test('only traits are put in the Concerns directory')
    ->expect('Rawilk\HumanKeys\Concerns')
    ->toBeTraits();

test('generators are not final')
    ->expect('Rawilk\HumanKeys\Generators')
    ->not->toBeFinal();
