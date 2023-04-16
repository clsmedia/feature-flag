<?php
declare(strict_types=1);

namespace Clsmedia\FeatureFlag\Flags;

interface Flags 
{
    public static function get(): string;
}