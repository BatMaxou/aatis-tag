<?php

namespace Aatis\Tag\Service;

use Aatis\Tag\Component\Tag;
use Aatis\Tag\Enum\TagOption;
use Aatis\Tag\Interface\TagBuilderInterface;
use Aatis\Tag\Interface\TagInterface;

/**
 * @template T of Tag
 *
 * @implements TagBuilderInterface<T>
 */
class TagBuilder implements TagBuilderInterface
{
    public function buildFromName(string $name, array $options = []): TagInterface|string
    {
        $tag = $this->newTag($options)->setName($name);

        return in_array(TagOption::BUILD_OBJECT, $options) ? $tag : $tag->getName();
    }

    /**
     * @param \BackedEnum[] $options
     */
    protected function newTag(array $options): TagInterface
    {
        return new Tag();
    }
}
