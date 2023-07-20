<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/migrations')
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@DoctrineAnnotation' => true,
        'phpdoc_separation' => [
            'groups' => [['ORM\\*'], ['Assert\\*']],
        ],
    ])
    ->setFinder($finder)
    ->setCacheFile('var/cache/.php-cs-fixer.cache')
;
