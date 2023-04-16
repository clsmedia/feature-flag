<?php
declare(strict_types=1);

namespace Clsmedia\FeatureFlag;

use Clsmedia\FeatureFlag\FeatureFlag;

require __DIR__ . '/vendor/autoload.php';

$cookieFeatureName = 'cookie_feature';
$envFeatureName = 'env_feature';
$inactiveFeatureName = 'disabled_feature';

putenv('FEATURE_FLAGS=test,'.$envFeatureName);
setcookie('FEATURE_FLAGS', $cookieFeatureName, 0, '/');



if (FeatureFlag::isActive($cookieFeatureName)) {
    echo $cookieFeatureName . ' is active' . PHP_EOL;
} else {
    echo $cookieFeatureName . ' is NOT active'. PHP_EOL;
}

if (FeatureFlag::isActive($envFeatureName)) {
    echo $envFeatureName . ' is active'. PHP_EOL;
} else {
    echo $envFeatureName . ' is NOT active'. PHP_EOL;
}

if (FeatureFlag::isActive($inactiveFeatureName)) {
    echo $inactiveFeatureName . ' is active'. PHP_EOL;
} else {
    echo $inactiveFeatureName . ' is NOT active'. PHP_EOL;
}