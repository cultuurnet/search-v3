<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class PagedCollectionTest extends TestCase
{
    /**
     * @var PagedCollection
     */
    protected $pagedCollection;

    public function setUp(): void
    {
        $this->pagedCollection = new PagedCollection();
    }

    public function testGetItemsPerPageMethod(): void
    {
        $this->pagedCollection->setItemsPerPage(10);

        $result = $this->pagedCollection->getItemsPerPage();
        $this->assertEquals(10, $result);
    }

    public function testGetTotalItems(): void
    {
        $this->pagedCollection->setTotalItems(120);

        $result = $this->pagedCollection->getTotalItems();
        $this->assertEquals(120, $result);
    }

    public function testGetMemberMethod(): void
    {
        $mockCollection = new Collection();
        $this->pagedCollection->setMember($mockCollection);

        $result = $this->pagedCollection->getMember();
        $this->assertInstanceOf(Collection::class, $result);
    }

    public function testGetFacets(): void
    {
        $mockFacetResults = new FacetResults();
        $this->pagedCollection->setFacets($mockFacetResults);

        $result = $this->pagedCollection->getFacets();
        $this->assertInstanceOf(FacetResults::class, $result);
    }
}
