<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'tags',
    'description' => 'Allows to tag various records and provides helpers to retrieve records by these tags.',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Hallgaeuer\\Tags\\' => 'Classes/',
        ],
    ],
];
