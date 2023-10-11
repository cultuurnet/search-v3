<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class LocationId extends AbstractParameter
{
    public function __construct(string $locationId)
    {
        $this->value = $locationId;
        $this->key = 'locationId';
    }
}
