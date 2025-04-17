<?php

namespace Aatis\Tag\Interface;

/**
 * @template T of TagInterface
 */
interface TagBuilderInterface
{
    /**
     * @param \BackedEnum[] $options
     *
     * @return T|string
     */
    public function buildFromName(string $name, array $options = []): TagInterface|string;
}
