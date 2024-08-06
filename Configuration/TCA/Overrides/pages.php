<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'pages',
    [
        'tx_tags_tags' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tags/Resources/Private/Language/locallang_db.xlf:pages.tx_tags_tags',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_tags_domain_model_tag',
                'suggestOptions' => [
                    'default' => [
                        'additionalSearchFields' => 'name',
                    ]
                ],
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
    ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'tx_tags_tags'
);