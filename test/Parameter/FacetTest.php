<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class FacetTest extends TestCase
{
    public function testConstructor(): void
    {
        $facet = new Facet('regions');

        $key = $facet->getKey();
        $value = $facet->getValue();

        $this->assertEquals('facets', $key);
        $this->assertEquals('regions', $value);
    }
}
