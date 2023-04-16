# clsmedia\feature-flag
A simple package to handle feature-flags via .env or cookie.

## Define via .env
If you are using .env then just define a list of your Feature Flags

```
FEATURE_FLAGS='feature1,feature2'
```

## Define via cookie
You can also define a list of Feature Flags in a cookie:

```
FEATURE_FLAGS='feature1,feature2'
```

## Usage

`FeatureFlag::isActive('feature1')` returns `true` if it finds the environment variable `FEATURE_FLAGS='feature1'` or when the cookie `FEATURE_FLAGS='feature1'` is set.

see `index.php` for an example
