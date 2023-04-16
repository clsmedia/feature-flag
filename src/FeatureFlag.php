<?php
declare(strict_types=1);

namespace Clsmedia\FeatureFlag;

use Clsmedia\FeatureFlag\Flags\CookieFlags;
use Clsmedia\FeatureFlag\Flags\EnvFlags;
use Clsmedia\FeatureFlag\Helpers\CreateArray;


class FeatureFlag
{
    private array $flags = [];

    public static function isActive(string $flag): bool
    {
        $featureFlag = new self;
        $featureFlag->prepare();

        return $featureFlag->exists($flag);
    }

    private function exists(string $flag): bool
    {
        return in_array($flag, $this->flags);
    }

    private function prepare(): void
    {
        $this->addFlags(CreateArray::FromString(EnvFlags::get()));
        $this->addFlags(CreateArray::FromString(CookieFlags::get()));
    }

    private function addFlags(array $flags): void
    {
        $this->flags = array_merge($this->flags,$flags);
        $this->flags = array_filter($this->flags);
    }

}