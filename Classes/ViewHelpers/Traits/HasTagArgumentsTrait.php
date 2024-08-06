<?php

namespace Hallgaeuer\Tags\ViewHelpers\Traits;

trait HasTagArgumentsTrait
{
    public function initializeArguments()
    {
        parent::initializeArguments();

        $this->registerArgument('tag', 'string', 'Tag to look for', false);
        $this->registerArgument('tags', 'array', 'Tags to look for', false);
        $this->registerArgument('tableName', 'string', 'Tags to look for', false, 'pages');
    }

    protected function getTagArguments(): array
    {
        return array_filter(
            array_merge(
                [$this->arguments['tag'] ?? ''],
                $this->arguments['tags'] ?? []
            )
        );
    }
}