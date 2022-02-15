# Laravel Luhn

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marvinlabs/laravel-luhn.svg?style=flat-square)](https://packagist.org/packages/marvinlabs/laravel-luhn)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/marvinlabs/laravel-luhn.svg?style=flat-square)](https://packagist.org/packages/marvinlabs/laravel-luhn)
[![Build Status](https://github.com/illuminatech/marvinlabs/laravel-luhn/build/badge.svg)](https://github.com/marvinlabs/laravel-luhn/actions)

`marvinlabs/laravel-luhn` is a laravel package providing various Laravel utilities to work with the
Luhn algorithm such as:

- a few validation rules
- dependency injection
- facade

The Luhn algorithm is used widely to verify that numbers are valid: credit card numbers, SIREN company 
codes, etc.

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

### Algorithm implementation

The package provides an implementation to the algorithm interface defined in `\MarvinLabs\Luhn\Contracts\LuhnAlgorithm`.

The contract provides 3 public methods to:

- Check if an input string is valid according to the Luhn algorithm
- Compute the check digit to append to a string in order to make it valid
- Compute the checksum according to the Luhn algorithm

### Facade

A facade is provided to access the Luhn algorithm implementation.

```php
Luhn::isValid('1234');
Luhn::computeCheckDigit('1234');
Luhn::computeCheckSum('1234');
```

### Dependency injection

You can get an implementation of the Luhn algorithm at any time using the Laravel container.

```php
$luhn = app(\MarvinLabs\Luhn\Contracts\LuhnAlgorithm::class); // Using the interface
$luhn = app('luhn'); // This shortcut works too, up to you ;)
```

### Validation 

The package provides custom rules to validate a string.

```php
$validator = Validator::make($data, [
    'number1' => 'luhn',         // Using shorthand notation
    'number2' => new LuhnRule(), // Using custom rule class
]);
```

## Version history

See the [dedicated change log](CHANGELOG.md)

## Credits

- Got some ideas from [nekman/luhn-algorithm](https://github.com/nekman/luhn-algorithm)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
