<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class TermIds extends AbstractParameter
{
    public function __construct(string $termId)
    {
        $this->value = $termId;
        $this->key = 'termIds';
    }

    public function allowsMultiple(): bool
    {
        return true;
    }
}
