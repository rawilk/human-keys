<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use Rawilk\HumanKeys\Generators\KsuidGenerator;
use Rawilk\HumanKeys\Tests\Fixture\Models\Post;
use Rawilk\HumanKeys\Tests\Fixture\Models\PostWithAutoIncrementing;
use Rawilk\HumanKeys\Tests\Fixture\Models\PostWithMultiKey;
use Rawilk\HumanKeys\Tests\Fixture\Models\PostWithUuid;
use Tuupola\Ksuid;

beforeEach(function () {
    config([
        'human-keys.generator' => KsuidGenerator::class,
    ]);
});

it('can generate a ksuid as the primary key for a model', function () {
    $post = Post::create(['name' => 'Example post']);

    expect($post->name)->toBe('Example post');

    [$prefix, $id] = explode('_', $post->getKey());

    expect($prefix)
        ->toBe(Post::humanKeyPrefix())
        ->and($id)
        ->toBeString()
        ->toHaveLength(Ksuid::ENCODED_SIZE);
});

it('generates a unique key for each model', function () {
    $post1 = Post::create(['name' => 'Example post']);
    $post2 = Post::create(['name' => 'Post 2']);

    expect($post1->getKey())
        ->not->toBe($post2->getKey());
});

test('a custom prefix can be used', function () {
    $model = new class extends Post
    {
        protected $table = 'posts';

        public static function humanKeyPrefix(): string
        {
            return 'foo';
        }
    };

    $post = $model::create(['name' => 'Example post']);

    [$prefix, $id] = explode('_', $post->getKey());

    expect($prefix)
        ->toBe('foo')
        ->and($id)
        ->toBeString()
        ->toHaveLength(Ksuid::ENCODED_SIZE);
});

it('can be used on models with auto-incrementing ids', function () {
    $post = PostWithAutoIncrementing::create(['name' => 'Example post']);

    [$prefix, $id] = explode('_', $post->post_id);

    expect($prefix)
        ->toBe(PostWithAutoIncrementing::humanKeyPrefix())
        ->and($id)
        ->toBeString()
        ->toHaveLength(Ksuid::ENCODED_SIZE)
        ->and($post->getKey())
        ->toBeNumeric();
});

it('can be used on models with uuids', function () {
    $post = PostWithUuid::create();

    [$prefix, $id] = explode('_', $post->post_id);

    expect($prefix)
        ->toBe(PostWithUuid::humanKeyPrefix())
        ->and($id)
        ->toBeString()
        ->toHaveLength(Ksuid::ENCODED_SIZE)
        ->and($post->getKey())
        ->toBeString()
        ->and(Str::isUuid($post->getKey()))
        ->toBeTrue();
});

test('multiple keys can be generated per record', function () {
    $post = PostWithMultiKey::create();

    [$prefix, $id] = explode('_', $post->getKey());
    [$prefix2, $id2] = explode('_', $post->post_id);

    expect($prefix)
        ->toBe(PostWithMultiKey::humanKeyPrefix())
        ->and($id)
        ->toBeString()
        ->toHaveLength(Ksuid::ENCODED_SIZE)
        ->and($prefix2)
        ->toBe(PostWithMultiKey::humanKeyPrefix())
        ->and($id2)
        ->toBeString()
        ->toHaveLength(Ksuid::ENCODED_SIZE)
        ->and($post->getKey())->not->toBe($post->post_id);
});
