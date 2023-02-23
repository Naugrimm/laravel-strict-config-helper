# Laravel Strict Config Helper

This package is mainly intended to work together with [PHPStan](https://phpstan.org/).

Laravel's helper `config($key, $default)` returns `mixed`. In higher PHPStan levels, you cannot perform
certain operations on `mixed` types. 

Example: 

https://phpstan.org/r/39022f87-cbae-4e7b-bb44-8a4a655d2f00

```php
<?php 

$value = config('foo');

if (strpos($value, 'bar')) {
  // do something	
}
```

This produces the following error:

| Line | Message                                                               |
|------|-----------------------------------------------------------------------|
| 10   | Parameter #1 $haystack of function strpos expects string, mixed given |

With this package, you can do:

https://phpstan.org/r/0c0e3e10-2dbd-418b-966d-2930016d803d

```php
$value = config_string('foo');

if (strpos($value, 'bar')) {
  // do something	
}
```

No error is returned, as `$value` is guaranteed to be a string.

A `RuntimeException` is thrown if the value in the config has the wrong type.

**Note:** The helper functions in this package cannot return `NULL`. So if the value is not set in your
config and you do not provide a `$default` value, an exception will be thrown.

### Installation

```shell
composer require naugrim/laravel-strict-config-helper
```

### Available Functions

```php
config_string(string $key, ?string $default = null): string
config_int(string $key, ?int $default = null): int
config_float(string $key, ?float $default = null): float
config_numeric(string $key, int | float | null $default = null): int | float
config_bool(string $key, ?bool $default = null): bool
```
