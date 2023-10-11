<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class TermLabels extends AbstractParameter
{
    public function __construct(string $termLabel)
    {
        $this->value = $termLabel;
        $this->key = 'termLabels';
    }

    public function allowsMultiple(): bool
    {
        return true;
    }
}
