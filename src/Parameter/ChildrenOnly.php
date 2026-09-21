<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class ChildrenOnly extends AbstractParameter
{
    public function __construct(bool $childrenOnly)
    {
        $this->value = $childrenOnly;
        $this->key = 'childrenOnly';
    }
}
