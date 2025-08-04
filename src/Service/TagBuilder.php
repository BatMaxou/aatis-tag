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
    public function buildFromInterfaces(array $interfaces, $options = []): array
    {
        $tags = [];

        foreach ($interfaces as $interface) {
            $tags[] = $this->buildFromInterface($interface, $options);
        }

        return array_unique($tags);
    }

    public function buildFromInterface(string $interface, $options = []): TagInterface|string
    {
        $explode = explode('\\', $interface);
        $interface = $explode[count($explode) - 1];
        if (str_ends_with($interface, 'Interface')) {
            $interface = substr($interface, 0, -9);
        }

        $tag = implode(array_map(
            fn ($letter) => ctype_upper($letter) ? sprintf('-%s', strtolower($letter)) : $letter,
            str_split(lcfirst($interface)),
        ));

        return $this->buildFromName($tag, $options);
    }

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
