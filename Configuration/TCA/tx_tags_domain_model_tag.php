<?php

return [
    'ctrl' => [
        'label' => 'name',
        'tstamp' => 'tstamp',
        'title' => 'LLL:EXT:tags/Resources/Private/Language/locallang_db.xlf:tx_tags_domain_model_tag',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'rootLevel' => '1',
        'enablecolumns' => [
        ],
        'searchFields' => 'name',
        'typeicon_classes' => [
            'default' => 'mimetypes-text-text',
        ],
    ],
    'columns' => [
        'name' => [
            'label' => 'LLL:EXT:tags/Resources/Private/Language/locallang_db.xlf:tx_tags_domain_model_tag.name',
            'config' => [
                'eval' => 'unique',
                'type' => 'input',
                'size' => 25,
                'max' => 255,
                'required' => true,
            ],
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'name'],
    ]
];
