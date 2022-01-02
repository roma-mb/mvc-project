<?php

function dd(...$parameter): void
{
    $backtrace = debug_backtrace();
    $line = $backtrace[0]['line'];
    $file = $backtrace[0]['file'];

    echo PHP_EOL."Export called at: {$file} ({$line})".PHP_EOL;

    $count = func_num_args();
    $argList = func_get_args();

    for ($i = 0; $i < $count; ++$i) {
        echo "[{$i}]\n";
        var_export($argList[$i]);
        echo "\n";
    }

    exit();
}

function array_get(array $target, ?string $key, $default = null)
{
    if (null === $key) {
        return $target;
    }

    $keys = explode('.', $key);

    while (!(($segment = array_shift($keys)) === null)) {
        $target = $target[$segment] ?? [];

        if (empty($target)) {
            return $default;
        }
    }

    return $target;
}

/**
 * @throws ReflectionException
 */
function resolve(string $class): object
{
    $reflectionClass = new \ReflectionClass($class);

    if (($constructor = $reflectionClass->getConstructor()) === null) {
        return $reflectionClass->newInstance();
    }

    if (($params = $constructor->getParameters()) === []) {
        return $reflectionClass->newInstance();
    }

    $newInstanceParams = [];
    foreach ($params as $param) {
        $newInstanceParams[] = null === $param->getClass()
            ? $param->getDefaultValue()
            : resolve($param->getClass()->getName());
    }

    return $reflectionClass->newInstanceArgs($newInstanceParams);
}
