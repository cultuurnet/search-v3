<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class Query extends AbstractParameter
{
    public function __construct(string $value)
    {
        $this->value = $value;
        $this->key = 'q';
    }
}
