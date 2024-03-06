<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use Rawilk\HumanKeys\Generators\UuidGenerator;
use Rawilk\HumanKeys\Tests\Fixture\Models\Post;

beforeEach(function () {
    config([
        'human-keys.generator' => UuidGenerator::class,
    ]);
});

it('can generate uuid ids for a model', function () {
    $uuid = str_replace('-', '', (string) Str::uuid());

    Str::createUuidsUsing(fn () => $uuid);

    $post = Post::create(['name' => 'Example post']);

    expect($post)
        ->id->toBe("pos_{$uuid}");

    Str::createUuidsNormally();
});
