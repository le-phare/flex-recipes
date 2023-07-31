<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/migrations')
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
;

return (new PhpCsFixer\Config())
// ->setRiskyAllowed(true)                              // Nouveau projet ? => Décommenter
    ->setRules([
        '@PhpCsFixer' => true,
        // '@PhpCsFixer:risky' => true,                 // Nouveau projet ? => Décommenter
        '@Symfony' => true,
        // '@Symfony:risky' => true,                    // Nouveau projet ? => Décommenter
        '@DoctrineAnnotation' => true,
        'phpdoc_separation' => [
            'groups' => [['ORM\\*'], ['Assert\\*']],
        ],
    ])
    ->setFinder($finder)
    ->setCacheFile('var/cache/.php-cs-fixer.cache')
;
