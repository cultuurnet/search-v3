<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class FacetResult
{
    /**
     * Field where facets are based on.
     * @var string
     */
    private $field;

    /**
     * @var FacetResultItem[]
     */
    private $results;

    /**
     * @param FacetResultItem[] $results
     */
    public function __construct(string $field, array $results)
    {
        $this->field = $field;
        $this->results = $results;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function setField(string $field): void
    {
        $this->field = $field;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param FacetResultItem[] $results
     */
    public function setResults(array $results): void
    {
        $this->results = $results;
    }
}
