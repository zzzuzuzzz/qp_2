<?php

spl_autoload_register(function ($class) {

    $base_dir = __DIR__ . DIRECTORY_SEPARATOR . '/src/';
    $prefix = 'App\\';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
