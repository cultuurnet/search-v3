<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Serializer\Serializer;
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
        $this->facetJson = file_get_contents(__DIR__ . '/data/facetResults.json');
        $serializer = new Serializer();
        $this->facetResults = $serializer->deserialize($this->facetJson, FacetResults::class);
    }

    private function deserializeFacilitiesTestData(array $results): array
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
        $result = $this->facetResults->getFacetResults();

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }

    public function testGetFacetResultsByFieldMethod(): void
    {
        $facilities = json_decode(file_get_contents(__DIR__ . '/data/facetResultsFacilities.json'), true);
        $facilitiesTestData = [new FacetResult('facilities', $this->deserializeFacilitiesTestData($facilities))];

        $result = $this->facetResults->getFacetResultsByField('facilities');

        $this->assertEquals($result, $facilitiesTestData);
    }
}
