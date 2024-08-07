<?php

namespace Hallgaeuer\Tags\TCA;

class ConfigurationUtility
{
    public static function registerTagField(
        string $tableName,
        string $fieldName = 'tx_tags_tags'
    ): void
    {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            $tableName,
            [
                'tx_tags_tags' => [
                    'exclude' => true,
                    'l10n_mode' => 'exclude',
                    'label' => 'LLL:EXT:tags/Resources/Private/Language/locallang_db.xlf:general.tagField',
                    'config' => static::getTagFieldConfiguration(
                        $tableName
                    )
                ],
            ]
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            $tableName,
            $fieldName
        );
    }

    public static function getTagFieldConfiguration(
        string $tableName
    ): array
    {
       return [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'tx_tags_domain_model_tag',
            'MM' => 'tx_tags_domain_model_tag_mm',
            'MM_match_fields' => [
                'type' => $tableName,
            ],
            'suggestOptions' => [
                'default' => [
                    'additionalSearchFields' => 'name',
                ]
            ],
            'fieldControl' => [
                'addRecord' => [
                    'disabled' => false,
                ],
            ],
        ];
    }
}