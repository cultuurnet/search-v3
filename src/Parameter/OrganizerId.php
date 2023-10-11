<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class OrganizerId extends AbstractParameter
{
    public function __construct(string $organizerId)
    {
        $this->value = $organizerId;
        $this->key = 'organizerId';
    }
}
