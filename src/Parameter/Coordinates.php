<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class Coordinates extends AbstractParameter
{
    public function __construct(string $latitude, string $longitude)
    {
        $this->value = $latitude . ',' . $longitude;
        $this->key = 'coordinates';
    }
}
