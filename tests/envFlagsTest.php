<?php
declare(strict_types=1);

namespace Clsmedia\FeatureFlag\tests;

use Clsmedia\FeatureFlag\Flags\EnvFlags;
use Clsmedia\FeatureFlag\FeatureFlag;
use PHPUnit\Framework\TestCase;

class EnvFlagsTest extends TestCase
{
    public function test_flag_from_env()
    {
        putenv('FEATURE_FLAGS=test,test2');
        $ff = FeatureFlag::isActive('test2');

        self::assertTrue($ff);
    }

    public function test_flag_from_env_with_spaces()
    {
        putenv('FEATURE_FLAGS=test, test2');
        $ff = FeatureFlag::isActive('test2');

        self::assertTrue($ff);
    }

    public function test_not_active_flag_from_env()
    {
        putenv('FEATURE_FLAGS=test,test2');
        $ff = FeatureFlag::isActive('test3');

        self::assertFalse($ff);
    }

    public function test_env_flag()
    {
        putenv('FEATURE_FLAGS=test,test2');
        $envFlags = EnvFlags::get();

        self::assertStringContainsString('test2', $envFlags);
    }

}