<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use Iterator;

/**
 * @implements Iterator<string,FacetResult>
 */
final class FacetResults implements \Iterator
{
    /**
     * @var FacetResult[]
     */
    private $facetResults = [];

    /**
     * @return FacetResult[]
     */
    public function getFacetResults(): array
    {
        return $this->facetResults;
    }

    /**
     * @param FacetResult[] $facetResults
     */
    public function setFacetResults(array $facetResults): void
    {
        $this->facetResults = $facetResults;
    }

    public function addFacetResult(string $key, FacetResult $facetResult): void
    {
        $this->facetResults[$key] = $facetResult;
    }

    public function getFacetResultsByField($field): array
    {
        $results = [];
        foreach ($this->facetResults as $facetResult) {
            if ($facetResult->getField() === $field) {
                $results[] = $facetResult;
            }
        }
        return $results;
    }

    public function current(): FacetResult
    {
        return current($this->facetResults);
    }

    public function next(): void
    {
        next($this->facetResults);
    }

    public function key(): int|string|null
    {
        return key($this->facetResults);
    }

    public function valid(): bool
    {
        return key($this->facetResults) !== null;
    }

    public function rewind(): void
    {
        reset($this->facetResults);
    }
}
