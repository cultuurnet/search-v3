<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3;

use CultuurNet\SearchV3\ValueObjects\PagedCollection;
use GuzzleHttp\ClientInterface;

interface SearchClientInterface
{
    public function setClient(ClientInterface $client);

    public function getClient(): ClientInterface;

    public function searchEvents(SearchQueryInterface $searchQuery): PagedCollection;

    public function searchPlaces(SearchQueryInterface $searchQuery): PagedCollection;

    public function searchOffers(SearchQueryInterface $searchQuery): PagedCollection;

    public function searchOrganizers(SearchQueryInterface $searchQuery): PagedCollection;
}
