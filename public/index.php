<?php

require_once __DIR__.'/../vendor/autoload.php';

$routes = require __DIR__.'/../src/config/routes.php';

if ($requestUri = array_get($_SERVER, 'REQUEST_URI')) {
    return array_key_exists($requestUri, $routes)
        ? dispatcher(array_get($routes, $requestUri, []))
        : require 'not-found.php';
}

/**
 * @throws ReflectionException
 */
function dispatcher(array $par)
{
    $class = array_get(array_keys($par), 0, '');
    $method = array_get($par, $class, '');

    return resolve($class)->{$method}();
}
