<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class Uitpas extends AbstractParameter
{
    public function __construct(bool $uitpas)
    {
        $this->value = $uitpas;
        $this->key = 'uitpas';
    }
}
