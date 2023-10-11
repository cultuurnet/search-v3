<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class Label extends AbstractParameter
{
    public function __construct(string $label)
    {
        $this->value = $label;
        $this->key = 'labels';
    }

    public function allowsMultiple(): bool
    {
        return true;
    }
}
