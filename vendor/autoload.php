<?php
/**
 * Minimal PSR-4 autoloader (no network access to Packagist in this environment,
 * so firebase/php-jwt is vendored manually below instead of via `composer install`).
 */

spl_autoload_register(function ($class) {
    $prefixes = [
        'Firebase\\JWT\\' => __DIR__ . '/firebase/php-jwt/src/',
    ];

    foreach ($prefixes as $prefix => $baseDir) {
        if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
            continue;
        }

        $relativeClass = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

        if (is_file($file)) {
            require $file;
            return;
        }
    }
});
