<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Tests\Fixture\Models;

use Illuminate\Database\Eloquent\Model;
use Rawilk\HumanKeys\Concerns\HasHumanKey;

class PostWithMultiKey extends Model
{
    use HasHumanKey;

    protected $table = 'posts_with_multi_keys';

    protected $guarded = [];

    public function humanKeys(): array
    {
        return [
            'id',
            'post_id',
        ];
    }
}
