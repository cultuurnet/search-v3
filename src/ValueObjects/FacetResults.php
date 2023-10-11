<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\HandlerCallback;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;

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

    public function key()
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

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(
        JsonDeserializationVisitor $visitor,
        array $values,
        DeserializationContext $context
    ): void {
        foreach ($values as $facet_type => $results) {
            $this->facetResults[$facet_type] = new FacetResult($facet_type, $this->deserializeResults($results));
        }
    }

    private function deserializeResults($results): array
    {
        $items = [];
        foreach ($results as $value => $result) {
            $children = isset($result['children']) ? $this->deserializeResults($result['children']) : [];
            $items[] = new FacetResultItem($value, new TranslatedString($result['name']), $result['count'], $children);
        }
        return $items;
    }
}
