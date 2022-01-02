<?php

$finder = PhpCsFixer\Finder::create()
    ->notPath('vendor')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR2' => true,
    '@PSR12' => true,
    '@PhpCsFixer' => false,
    'strict_param' => true,
    'array_syntax' => ['syntax' => 'short']
])
    ->setLineEnding("\n")
    ->setIndent("    ")
    ->setFinder($finder);
