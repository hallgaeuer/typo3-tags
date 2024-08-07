<?php

namespace Hallgaeuer\Tags\ViewHelpers\Tagged;

use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\ParameterType;
use Hallgaeuer\Tags\Finder\TaggedRecordFinder;
use Hallgaeuer\Tags\ViewHelpers\Traits\HasTagArgumentsTrait;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UidViewHelper extends AbstractViewHelper
{
    use HasTagArgumentsTrait;

    public function __construct(protected TaggedRecordFinder $taggedRecordFinder)
    {
    }

    public function render(): ?int
    {
        $tags = $this->getTagArguments();

        if (!$tags) {
            return null;
        }

        return $this->taggedRecordFinder->findFirstUidWithTags($tags, $this->arguments['type']);
    }
}