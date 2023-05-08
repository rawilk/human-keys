<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Tests\Fixture\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Rawilk\HumanKeys\Concerns\HasHumanKey;

class PostWithUuid extends Model
{
    use HasUuids;
    use HasHumanKey;

    protected $table = 'posts_with_uuid';

    protected $guarded = [];

    public function humanKeys(): array
    {
        return [
            'post_id',
        ];
    }
}
