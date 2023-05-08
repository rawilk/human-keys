<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Tests\Fixture\Models;

use Illuminate\Database\Eloquent\Model;
use Rawilk\HumanKeys\Concerns\HasHumanKey;

class Post extends Model
{
    use HasHumanKey;

    protected $guarded = [];
}
