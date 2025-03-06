<?php

/**
 * @param $key
 * @param null $default
 * @return array|bool|string|null
 */
function env($key, $default = null): array|bool|string|null
{
    $value = $_ENV[$key] ?? $_SERVER[$key];

    if ($value === false) {
        return $default;
    }

    return match (strtolower($value)) {
        'true', '(true)' => true,
        'false', '(false)' => false,
        default => $value,
    };

}
