<?php

declare(strict_types=1);

if (! function_exists('config_string')) {
    function config_string(string $key, ?string $default = null): string
    {
        $value = config($key, $default) ?? $default;
        if (! is_string($value)) {
            throw new RuntimeException('The config value at ' . $key . ' must return a string.');
        }
        return $value;
    }
}

if (! function_exists('config_int')) {
    function config_int(string $key, ?int $default = null): int
    {
        $value = config($key, $default) ?? $default;
        if (! is_int($value)) {
            throw new RuntimeException('The config value at ' . $key . ' must return an integer.');
        }

        return $value;
    }
}

if (! function_exists('config_float')) {
    function config_float(string $key, ?float $default = null): float
    {
        $value = config($key, $default) ?? $default;
        if (! is_float($value)) {
            throw new RuntimeException('The config value at ' . $key . ' must return a float.');
        }

        return $value;
    }
}

if (! function_exists('config_numeric')) {
    function config_numeric(string $key, int | float | null $default = null): int | float
    {
        $value = config($key, $default) ?? $default;
        if (! is_float($value) && ! is_int($value)) {
            throw new RuntimeException('The config value at ' . $key . ' must return a float or an integer.');
        }

        return $value;
    }
}

if (! function_exists('config_bool')) {
    function config_bool(string $key, ?bool $default = null): bool
    {
        $value = config($key, $default) ?? $default;
        if (! is_bool($value)) {
            throw new RuntimeException('The config value at ' . $key . ' must return a boolean.');
        }

        return $value;
    }
}
