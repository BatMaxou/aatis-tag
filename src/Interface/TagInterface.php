<?php

namespace Aatis\Tag\Interface;

use Aatis\ParameterBag;

interface TagInterface extends \Stringable
{
    public function getName(): string;

    public function getParameters(): ParameterBag;

    public function setName(string $name): static;

    public function setParameters(ParameterBag $parameters): static;
}
