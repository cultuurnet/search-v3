<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

final class PagedCollection
{
    /**
     * Total items per page
     * @var int|null
     * @Type("integer")
     */
    private $itemsPerPage;

    /**
     * Total items found.
     * @var int|null
     * @Type("integer")
     */
    private $totalItems;

    /**
     * All members of this collection result.
     * @var Collection|null
     * @Type("CultuurNet\SearchV3\ValueObjects\Collection")
     */
    private $member;

    /**
     * All facets for this paged collection.
     * @var FacetResults|null
     * @Type("CultuurNet\SearchV3\ValueObjects\FacetResults")
     * @SerializedName("facet")
     */
    private $facets;

    public function getItemsPerPage(): ?int
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage(int $itemsPerPage): void
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getTotalItems(): ?int
    {
        return $this->totalItems;
    }

    public function setTotalItems(int $totalItems): void
    {
        $this->totalItems = $totalItems;
    }

    public function getMember(): ?Collection
    {
        return $this->member;
    }

    public function setMember(Collection $member): void
    {
        $this->member = $member;
    }

    public function getFacets(): ?FacetResults
    {
        return $this->facets;
    }

    public function setFacets(FacetResults $facets): void
    {
        $this->facets = $facets;
    }
}
