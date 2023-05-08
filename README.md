# human-keys

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rawilk/human-keys.svg?style=flat-square)](https://packagist.org/packages/rawilk/human-keys)
![Tests](https://github.com/rawilk/human-keys/workflows/Tests/badge.svg?style=flat-square)
[![Total Downloads](https://img.shields.io/packagist/dt/rawilk/human-keys.svg?style=flat-square)](https://packagist.org/packages/rawilk/human-keys)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/rawilk/human-keys?style=flat-square)](https://packagist.org/packages/rawilk/human-keys)
[![License](https://img.shields.io/github/license/rawilk/human-keys?style=flat-square)](https://github.com/rawilk/human-keys/blob/main/LICENSE.md)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require rawilk/human-keys
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="human-keys-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="human-keys-config"
```

You can view the default configuration here: https://github.com/rawilk/human-keys/blob/main/config/human-keys.php

## Usage

``` php
$human-keys = new Rawilk\HumanKeys;
echo $human-keys->echoPhrase('Hello, Rawilk!');
```

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

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

Please review [my security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [Randall Wilk](https://github.com/rawilk)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
