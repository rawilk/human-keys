<?php

declare(strict_types=1);

use Rawilk\HumanKeys\Generators\SnowflakeGenerator;
use Rawilk\HumanKeys\Tests\Fixture\Models\Post;

beforeEach(function () {
    config([
        'human-keys.generator' => SnowflakeGenerator::class,
    ]);
});

it('can generate snowflake ids for a model', function () {
    $post = Post::create(['name' => 'Example post']);

    [$prefix, $id] = explode('_', $post->getKey());

    expect($prefix)
        ->toBe(Post::humanKeyPrefix())
        ->and($id)
        ->toHaveLength(18);
});
