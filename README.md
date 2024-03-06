# human-keys

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rawilk/human-keys.svg?style=flat-square)](https://packagist.org/packages/rawilk/human-keys)
![Tests](https://github.com/rawilk/human-keys/workflows/Tests/badge.svg?style=flat-square)
[![Total Downloads](https://img.shields.io/packagist/dt/rawilk/human-keys.svg?style=flat-square)](https://packagist.org/packages/rawilk/human-keys)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/rawilk/human-keys?style=flat-square)](https://packagist.org/packages/rawilk/human-keys)
[![License](https://img.shields.io/github/license/rawilk/human-keys?style=flat-square)](https://github.com/rawilk/human-keys/blob/main/LICENSE.md)

![social image](https://banners.beyondco.de/Human%20Keys.png?theme=light&packageManager=composer+require&packageName=rawilk%2Fhuman-keys&pattern=architect&style=style_1&description=Use+Stripe-like+keys+for+your+models.&md=1&showWatermark=0&fontSize=100px&images=key)

Human Keys offers an alternative to using UUIDs for your Laravel Models. By default, it generates ksuids, similar to what Stripe uses for their resources.
Ksuids are human-readable and sortable.

Example:

-   `pos_2JvL8Gv5mirjbIVAlSRFrC8EaWR` for `Models/Post.php`
-   `usr_p6UEyCc8D8ecLijAI5zVwOTP3D0` for `Models/User.php`

## Installation

You can install the package via composer:

```bash
composer require rawilk/human-keys
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="human-keys-config"
```

If you are using the `KsuidGenerator`, you will need to install the `tuupola/ksuid` package:

```bash
composer require tuupola/ksuid
```

See [Using a Different Generator](#using-a-different-generator) for more information.

You can view the default configuration here: https://github.com/rawilk/human-keys/blob/main/config/human-keys.php

## Usage

To get started, use the `HasHumanKey` trait on your model:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rawilk\HumanKeys\Concerns\HasHumanKey;

class Post extends Model
{
    use HasHumanKey;
}
```

### Using a Different Generator

By default, the package is configured to use the `KsuidGenerator`, however you may define a custom generator to use under the `generator` key in the config file.

Below you will find out how to use the different generators that are included with this package, and how to create your own.

#### KsuidGenerator

This is the default generator that is used. You will need to install the `tuupola/ksuid` package to use it.
This generator will generate something like this: `pos_2JvL8Gv5mirjbIVAlSRFrC8EaWR`.

```bash
composer require tuupola/ksuid
```

#### SnowflakeGenerator

This generator generates IDs based on the Snowflake Algorithm announced by Twitter. You will need to install the `godruoyi/php-snowflake` package to use it.
This generator will generate something like this: `pos_451734027389370636`.

```bash
composer require godruoyi/php-snowflake
```

#### Custom Generator

You may define your own generator by implementing the `Rawilk\HumanKeys\Contracts\KeyGenerator` contract. From the generator, you may return an ID based on your application's requirements.

```php
namespace App\Generators;

use Rawilk\HumanKeys\Contracts\KeyGenerator;

class CustomGenerator implements KeyGenerator
{
    public function generate(?string $prefix = null): string
    {
        // Generate your ID here...
    }
}
```

Then, in the config file, you may specify your generator:

```php
'generator' => App\Generators\CustomGenerator::class,
```

### Overriding the Key Prefix

By default, the key the first 3 characters of the model's class name. You may override this by defining a `humanKeyPrefix` method on your model:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rawilk\HumanKeys\Concerns\HasHumanKey;

class Post extends Model
{
    use HasHumanKey;

    public static function humanKeyPrefix() : string
    {
        // You should omit an underscore at the end of the prefix, as it will be added automatically
        // by the generator.
        return 'custom_prefix';
    }
}
```

### Using it For Other Columns

By default, the `HasHumanKey` trait will generate an ID for your model's primary key column. This may not be what you want, however.
In your model, you may override the `humanKeys` method and return a listing of the columns that should be generated for.

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rawilk\HumanKeys\Concerns\HasHumanKey;

class Post extends Model
{
    use HasHumanKey;

    public function humanKeys(): array
    {
        return ['human_key'];
    }
}
```

Now the `human_key` column will be generated for instead of the primary key. This is useful if your model is already using auto-incrementing IDs or
if you are using `UUID` or `ULID` for your primary keys. The `HasHumanKey` trait is fully compatible with Laravel's `HasUuids` or `HasUlids` traits.

If you really need to, you may even override the `newHumanKey` method on your model to generate a custom ID in a way of your choosing, however in most cases
this shouldn't be necessary.

## Scripts

### Setup

For convenience, you can run the setup bin script for easy installation for local development.

```bash
./bin/setup.sh
```

### Formatting

Although formatting is done automatically via workflow, you can format php code locally before committing with a composer script:

```bash
composer format
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

Please review [my security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Alternatives

This package is very similar to the [laravel-human-keys](https://github.com/oneduo/laravel-human-keys) package by [oneduo](https://github.com/oneduo), however I created my own version because I wanted
more flexibility in which columns IDs are generated for.

Other alternatives include:
- [spatie/laravel-prefixed-ids](https://github.com/spatie/laravel-prefixed-ids)

## Credits

-   [Randall Wilk](https://github.com/rawilk)
-   [All Contributors](../../contributors)
-   [godruoyi/php-snowflake](https://github.com/godruoyi/php-snowflake)
-   [tuupola/ksuid](https://github.com/tuupola/ksuid)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
