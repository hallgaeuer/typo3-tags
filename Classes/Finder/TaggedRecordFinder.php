<?php

namespace Hallgaeuer\Tags\Finder;

use Doctrine\DBAL\ArrayParameterType;
use TYPO3\CMS\Core\Database\ConnectionPool;

class TaggedRecordFinder
{
    public function __construct(protected ConnectionPool $connectionPool)
    {
    }

    public function findFirstUidWithTags(array $tags, string $type): ?int
    {
        return $this->findUidsWithTags($tags, $type, 1)[0] ?? null;
    }

    /**
     * @param array $tags
     * @param string $type
     * @param int|null $limit
     * @return int[]
     */
    public function findUidsWithTags(array $tags, string $type, ?int $limit = null): array {
        return $this->findMixedTypeUidsWithTags(
            $tags,
            [$type],
            $limit
        )[$type] ?? [];
    }

    /**
     * @param array $tags
     * @param array $types
     * @param int|null $limit
     * @return int[][]
     * @throws \Doctrine\DBAL\Exception
     */
    public function findMixedTypeUidsWithTags(array $tags, array $types = [], ?int $limit = null): array
    {
        $queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_tags_domain_model_tag');
        $queryBuilder
            ->select('tx_tags_domain_model_tag_mm.*')
            ->from('tx_tags_domain_model_tag')
            ->innerJoin(
                'tx_tags_domain_model_tag',
                'tx_tags_domain_model_tag_mm',
                'tx_tags_domain_model_tag_mm',
                'tx_tags_domain_model_tag.uid = tx_tags_domain_model_tag_mm.uid_local'
            )
            ->where(
                $queryBuilder->expr()->in(
                    'tx_tags_domain_model_tag.name',
                    $queryBuilder->createNamedParameter(
                        $tags,
                        ArrayParameterType::STRING
                    )
                )
            )
            ->andWhere(
                $queryBuilder->expr()->in(
                    'tx_tags_domain_model_tag_mm.type',
                    $queryBuilder->createNamedParameter(
                        $types,
                        ArrayParameterType::STRING
                    )
                )
            );

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }

        $groupedResultByType = [];

        foreach ($queryBuilder->executeQuery()->fetchAllAssociative() as $row) {
            $groupedResultByType[$row['type']][] = $row['uid_foreign'];
        }

        return $groupedResultByType;
    }

    public function findRecordsWithTags(array $tags, string $type): array
    {
        throw new \Exception('Not implemented');
    }

    public function findMixedRecordsWithTags(array $tags, array $types = []): array
    {
        throw new \Exception('Not implemented');
    }
}