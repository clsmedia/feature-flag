<?php

declare(strict_types=1);

namespace Clsmedia\FeatureFlag;

use Clsmedia\FeatureFlag\Flags\CookieFlags;
use Clsmedia\FeatureFlag\Flags\EnvFlags;
use Clsmedia\FeatureFlag\Helpers\CreateArray;


class FeatureFlag
{
    private array $flags = [];

    public function __construct()
    {
        $this->prepare();
    }

    public static function isActive(string $flag): bool
    {
        return (new self)->has($flag);
    }

    public function has(string $flag): bool
    {
        return in_array($flag, $this->flags);
    }

    private function prepare(): void
    {
        $this->addFlags(CreateArray::fromString(EnvFlags::get()));
        $this->addFlags(CreateArray::fromString(CookieFlags::get()));
    }

    private function addFlags(array $flags): void
    {
        $this->flags = array_merge($this->flags, $flags);
        $this->flags = array_filter($this->flags);
    }

}