<?php

namespace CultuurNet\SearchV3\Parameter;

final class Name extends AbstractParameter
{
    public function __construct(string $name)
    {
        $this->value = $name;
        $this->key = 'name';
    }
}