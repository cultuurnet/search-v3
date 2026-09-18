<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class HasOvernightStay extends AbstractParameter
{
    public function __construct(bool $hasOvernightStay)
    {
        $this->value = $hasOvernightStay;
        $this->key = 'hasOvernightStay';
    }
}
