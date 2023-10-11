<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class CollectionTest extends TestCase
{
    /**
     * @var Collection
     */
    protected $collection;

    public function setUp(): void
    {
        $this->collection = new Collection();
    }

    public function testGetItemsMethod(): void
    {
        $items = ['item1', 'item2', 'item3'];
        $this->collection->setItems($items);

        $result = $this->collection->getItems();
        $this->assertEquals($items, $result);
    }
}
