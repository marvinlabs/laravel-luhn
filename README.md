# Laravel Luhn

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marvinlabs/laravel-luhn.svg?style=flat-square)](https://packagist.org/packages/marvinlabs/laravel-luhn)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/marvinlabs/laravel-luhn.svg?style=flat-square)](https://packagist.org/packages/marvinlabs/laravel-luhn)

`marvinlabs/laravel-luhn` is a laravel package around the PHP package [nekman/luhn-algorithm](https://github.com/nekman/luhn-algorithm).

It adds various Laravel utilities such as:

- a few validation rules
- dependency injection
- facade

## Installation

You can install the package via composer:

``` bash
composer require marvinlabs/laravel-luhn
```

If you are using Laravel 5.5, the service provider and facade will automatically be discovered. 

On earlier versions, you need to do that manually. You must install the service provider:

```php
// config/app.php
'providers' => [
    ...
    MarvinLabs\Luhn\LuhnServiceProvider::class
];
```

And optionally register an alias for the facade.

```php
// config/app.php
'aliases' => [
    ...
    'Luhn' => MarvinLabs\Luhn\Facades\Luhn::class,
];
```

## Usage

*TBD*

## Version history

See the [dedicated change log](CHANGELOG.md)

## Credits

- Wrapped PHP package [nekman/luhn-algorithm](https://github.com/nekman/luhn-algorithm)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
