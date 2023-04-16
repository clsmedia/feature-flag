<?php
declare(strict_types=1);

namespace Clsmedia\FeatureFlag\Flags;

class CookieFlags implements Flags
{
    private array $flags = [];

    public static function get(): string
    {
        $cookieFlags = new Self;
        return isset($_COOKIE['FEATURE_FLAGS']) ? $_COOKIE['FEATURE_FLAGS'] : '';
    }
}