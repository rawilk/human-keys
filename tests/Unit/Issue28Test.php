<?php

declare(strict_types=1);

// @see https://github.com/rawilk/human-keys/issues/28

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Rawilk\HumanKeys\Concerns\HasHumanKey;
use Rawilk\HumanKeys\Generators\UuidGenerator;

beforeEach(function () {
    config([
        'human-keys.generator' => UuidGenerator::class,
    ]);

    Schema::create('contacts-28', function (Blueprint $table) {
        $table->id();
        $table->string('guid')->unique();
        $table->timestamps();
    });
});

test('key is generated', function () {
    $contact = Contact::create();

    expect($contact->guid)->not->toBeNull()
        ->toStartWith('con_');
});

class Contact extends Model
{
    use HasHumanKey;

    protected $table = 'contacts-28';

    public static function humanKeyPrefix(): string
    {
        return 'con';
    }

    public function humanKeys(): array
    {
        return ['guid'];
    }
}
