<?php

declare(strict_types=1);

namespace Rawilk\HumanKeys\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Rawilk\HumanKeys\Facades\HumanKeys;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait HasHumanKey
{
    public static function bootHasHumanKey(): void
    {
        static::creating(static function (Model $model) {
            /** @var \Rawilk\HumanKeys\Concerns\HasHumanKey $model */
            foreach ($model->humanKeys() as $key) {
                if (empty($model->getAttribute($key))) {
                    $model->setAttribute(
                        $key,
                        $model->newHumanKey(),
                    );
                }
            }
        });
    }

    public static function humanKeyPrefix(): string
    {
        return Str::of(static::class)
            ->classBasename()
            ->lower()
            ->limit(3, '')
            ->toString();
    }

    public function initializeHasHumanKey(): void
    {
        if (in_array($this->getKeyName(), $this->humanKeys(), true)) {
            $this->keyType = 'string';
            $this->incrementing = false;
        }
    }

    /**
     * Get the columns that should receive human-readable keys.
     */
    public function humanKeys(): array
    {
        return [$this->getKeyName()];
    }

    public function newHumanKey(): string
    {
        return HumanKeys::generate(static::humanKeyPrefix());
    }
}
