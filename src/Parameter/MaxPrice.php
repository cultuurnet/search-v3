<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class MaxPrice extends AbstractParameter
{
    public function __construct(float $maxPrice)
    {
        $this->value = $maxPrice;
        $this->key = 'maxPrice';
    }
}
