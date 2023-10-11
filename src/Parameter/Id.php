<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class Id extends AbstractParameter
{
    public function __construct(string $id)
    {
        $this->value = $id;
        $this->key = 'id';
    }
}
