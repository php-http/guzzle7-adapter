<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);
$config = new PhpCsFixer\Config();

return $config->setFinder($finder)
    ->setRules([
         '@Symfony' => true,
         'array_syntax' => ['syntax' => 'short'],
         'no_trailing_comma_in_singleline' => ['elements' => ['array', 'array_destructuring', 'group_import']],
    ]);
