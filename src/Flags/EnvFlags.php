<?php
declare(strict_types=1);

namespace Clsmedia\FeatureFlag\Flags;

class EnvFlags implements Flags
{
    private array $flags = [];

    public static function get(): string
    {
        $envFlags = new Self;
        return getenv('FEATURE_FLAGS') ? getenv('FEATURE_FLAGS') : '';
    }

}