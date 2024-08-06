<?php

namespace Hallgaeuer\Tags\ViewHelpers\Tagged;

use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\ParameterType;
use Hallgaeuer\Tags\ViewHelpers\Traits\HasTagArgumentsTrait;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UidViewHelper extends AbstractViewHelper
{
    use HasTagArgumentsTrait;

    public function __construct(protected ConnectionPool $connectionPool)
    {
    }

    public function render(): ?int
    {
        $tags = $this->getTagArguments();

        if (!$tags) {
            return null;
        }

        $queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_tags_domain_model_tag');
        $queryBuilder
            ->select('*')
            ->from('tx_tags_domain_model_tag')
            ->where(
                $queryBuilder->expr()->in(
                    'tx_tags_domain_model_tag.name',
                    $queryBuilder->createNamedParameter(
                        $tags,
                        ArrayParameterType::STRING
                    )
                )
            );

        return $queryBuilder->executeQuery()->fetchAllAssociative()[0]['uid'] ?? null;
    }
}