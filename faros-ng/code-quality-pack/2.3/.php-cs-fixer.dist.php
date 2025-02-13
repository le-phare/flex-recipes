<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/migrations')
    ->in(__DIR__.'/tests')
;

return (new PhpCsFixer\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setRules([
        '@Symfony' => true,
        '@DoctrineAnnotation' => true,
        'no_unused_imports' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
        ],
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'new_line_for_chained_calls',
        ],
        'phpdoc_separation' => [
            'groups' => [['ORM\\*'], ['Assert\\*']],
        ]
    ])
    ->setFinder($finder)
    ->setCacheFile('var/cache/.php-cs-fixer.cache')
;
