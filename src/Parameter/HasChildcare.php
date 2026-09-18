<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class HasChildcare extends AbstractParameter
{
    public function __construct(bool $hasChildcare)
    {
        $this->value = $hasChildcare;
        $this->key = 'hasChildcare';
    }
}
