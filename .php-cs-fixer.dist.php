<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);
$config = new PhpCsFixer\Config();

return $config->setFinder($finder)
    ->setRules([
         '@Symfony' => true,
         'array_syntax' => ['syntax' => 'short'],
    ]);
