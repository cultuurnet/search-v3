<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class FacetResultItemTest extends TestCase
{
    /**
     * @var FacetResultItem
     */
    protected $facetResultItem;

    public function setUp(): void
    {
        $value = 'facetResultItemValue';
        $names = new TranslatedString(['name1', 'name2']);
        $count = 2;
        $children = ['child1', 'child2'];
        $this->facetResultItem = new FacetResultItem($value, $names, $count, $children);
    }

    public function testGetValueMethod(): void
    {
        $this->facetResultItem->setValue('new facetResultItemValue');

        $result = $this->facetResultItem->getValue();
        $this->assertEquals('new facetResultItemValue', $result);
    }

    public function testGetNamesMethod(): void
    {
        $names = new TranslatedString(['new name1', 'new name2']);
        $this->facetResultItem->setName($names);

        $this->assertEquals($names, $this->facetResultItem->getName());
    }

    public function testGetCountMethod(): void
    {
        $this->facetResultItem->setCount(3);

        $result = $this->facetResultItem->getCount();
        $this->assertEquals(3, $result);
    }

    public function testGetChildrenMethod(): void
    {
        $this->facetResultItem->setChildren(['new child1', 'new child2']);

        $result = $this->facetResultItem->getChildren();
        $this->assertEquals(['new child1', 'new child2'], $result);
    }
}
