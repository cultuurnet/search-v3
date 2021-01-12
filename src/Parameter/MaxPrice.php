<?php

namespace CultuurNet\SearchV3\Parameter;

class MaxPrice extends AbstractParameter
{
    public function __construct(float $maxPrice)
    {
        $this->value = $maxPrice;
        $this->key = 'maxPrice';
    }
}
