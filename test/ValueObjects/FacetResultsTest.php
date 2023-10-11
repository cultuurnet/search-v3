<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use PHPUnit\Framework\TestCase;

final class FacetResultsTest extends TestCase
{
    /**
     * @var FacetResults
     */
    protected $facetResults;

    protected $facetJson;

    public function setUp(): void
    {
        $this->facetResults = new FacetResults();
        $this->facetJson = json_decode(file_get_contents(__DIR__ . '/data/facetResults.json'), true);
    }

    public function deserializeEverything(): void
    {
        /** @var JsonDeserializationVisitor $visitor */
        $visitor = $this->createMock(JsonDeserializationVisitor::class);

        /** @var DeserializationContext $context */
        $context = $this->createMock(DeserializationContext::class);

        $this->facetResults->deserializeFromJson($visitor, $this->facetJson, $context);
    }

    public function deserializeFacilitiesTestData($results): array
    {
        $items = [];
        foreach ($results as $value => $result) {
            $children = isset($result['children']) ? $this->deserializeFacilitiesTestData($result['children']) : [];
            $items[] = new FacetResultItem($value, new TranslatedString($result['name']), $result['count'], $children);
        }

        return $items;
    }

    public function testGetFacetResultsMethod(): void
    {
        $this->facetResults->setFacetResults($this->facetJson);
        $result = $this->facetResults->getFacetResults();
        $this->assertEquals($result, $this->facetJson);
    }

    public function testGetFacetResultsByFieldMethod(): void
    {
        $this->deserializeEverything();

        $facilities = json_decode(file_get_contents(__DIR__ . '/data/facetResultsFacilities.json'), true);
        $facilitiesTestData[] = new FacetResult('facilities', $this->deserializeFacilitiesTestData($facilities));

        $result = $this->facetResults->getFacetResultsByField('facilities');

        $this->assertEquals($result, $facilitiesTestData);
    }
}
