<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class Price extends AbstractParameter
{
    public function __construct(float $price)
    {
        $this->value = $price;
        $this->key = 'price';
    }
}
