<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Tests\Fixture\Models;

use Illuminate\Database\Eloquent\Model;
use Rawilk\HumanKeys\Concerns\HasHumanKey;

class PostWithAutoIncrementing extends Model
{
    use HasHumanKey;

    protected $table = 'posts_auto_incrementing';

    protected $guarded = [];

    public function humanKeys(): array
    {
        return ['post_id'];
    }
}
