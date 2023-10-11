<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class FacetResultTest extends TestCase
{
    /**
     * @var FacetResult
     */
    protected $facetResult;

    public function setUp(): void
    {
        $field = 'facet result field';
        $results = new FacetResultItem('foo', new TranslatedString(['nl' => 'Foo']), 0, []);
        $this->facetResult = new FacetResult($field, [$results]);
    }

    public function testGetFieldMethod(): void
    {
        $this->facetResult->setField('new facet result field');

        $result = $this->facetResult->getField();
        $this->assertEquals('new facet result field', $result);
    }

    public function testGetResultsMethod(): void
    {
        $newResults = new FacetResultItem('foobar', new TranslatedString(['nl' => 'Foobar']), 10, []);
        $this->facetResult->setResults([$newResults]);

        $result = $this->facetResult->getResults();
        $this->assertEquals([$newResults], $result);
    }
}
