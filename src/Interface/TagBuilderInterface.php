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

    /**
     * @param \BackedEnum[] $options
     *
     * @return T|string
     */
    public function buildFromInterface(string $interface, $options = []): TagInterface|string;

    /**
     * @param class-string[] $interfaces
     * @param \BackedEnum[] $options
     *
     * @return TagInterface[]|string[]
     */
    public function buildFromInterfaces(array $interfaces, $options = []): array;
}
