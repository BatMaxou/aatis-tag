<?php

namespace Aatis\Tag\Component;

use Aatis\ParameterBag;
use Aatis\Tag\Interface\TagInterface;

class Tag implements TagInterface
{
    public const TAG_PREFIX = '@tag_';

    protected string $name;

    protected ParameterBag $parameters;

    public function __construct()
    {
        $this->parameters = new ParameterBag();
    }

    public function getName(): string
    {
        return sprintf(
            '%s%s',
            self::TAG_PREFIX,
            $this->name,
        );
    }

    public function getParameters(): ParameterBag
    {
        return $this->parameters;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function setParameters(ParameterBag $parameters): static
    {
        $this->parameters = $parameters;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
