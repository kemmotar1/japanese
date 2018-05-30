<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces([
    'Japanese\Forms'                => $config->application->formsDir,
    'Japanese'                      => $config->application->libraryDir
]);

$loader->register();

// Use composer autoloader to load vendor classes
//require_once BASE_PATH . '/vendor/autoload.php';