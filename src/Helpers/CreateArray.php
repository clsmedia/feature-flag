<?php
declare(strict_types=1);

namespace Clsmedia\FeatureFlag\Helpers;

class CreateArray
{
    public static function fromString(string $string): array
    {
        $string = str_replace(' ','', $string);
        return explode(',', $string);
    }
}