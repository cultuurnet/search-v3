# search-v3

This PHP library allows you to integrate with publiq's Search API3.

Full API documentation: https://docs.publiq.be/docs/uitdatabank/search-api/introduction <br />
Getting an API key: https://platform.publiq.be

## Installation

```bash
composer require cultuurnet/search-v3
```

## Usage

Set up a Guzzle client with a URL and API key for the test environment of Search API3 like this:

```php
$httpClient = new GuzzleHttp\Client([
    'base_uri' => 'https://search-test.uitdatabank.be/',
    'headers' => [
        'X-Api-Key' => 'YOUR_API_KEY_FOR_TEST_ENV',
    ],
]);
```

Then, set up the search-v3 `SearchClient` like this:

```php
$searchClient = new CultuurNet\SearchV3\SearchClient(
    $httpClient, // HTTP client set up in the previous step
    new CultuurNet\SearchV3\Serializer\Serializer() // Built-in serializer to deserialize the JSON responses
);
```

You can then perform searches like this:

```php
$searchQuery = new \CultuurNet\SearchV3\SearchQuery();
$events = $searchClient->searchEvents($searchQuery); // Search events
$places = $searchClient->searchPlaces($searchQuery); // Search places
$offers = $searchClient->searchOffers($searchQuery); // Search both events + places
```

The results are an instance of `\CultuurNet\SearchV3\ValueObjects\PagedCollection`, which supports the following methods:

```php
// Get pagination info
$events->getItemsPerPage();
$events->getTotalItems();

// Get the search results, as instances of CultuurNet\SearchV3\ValueObjects\Event
// and CultuurNet\SearchV3\ValueObjects\Place
$events->getMember()->getItems();

// Get the facet results as an instance of CultuurNet\SearchV3\ValueObjects\FacetResults
$events->getFacets();
```

To customize your search, you can configure `\CultuurNet\SearchV3\SearchQuery` like this:

```php
$searchQuery = new \CultuurNet\SearchV3\SearchQuery();

// Embed the JSON-LD of the search results, instead of only the ID and type.
$searchQuery->setEmbed(true);

// Set the number of which result to fetch first. Defaults to 0.
// If the first page had a limit of 30 for example, and you want to get the results of the second page, set the start to
// 30. (So the start is always the limit multiplied by the page number you want to get, starting with 0.)
$searchQuery->setStart(0);

// Set the max amount of results to return per page.
$searchQuery->setLimit(30);

// Add a sort (see SAPI3 docs for possible fields to sort on)
$searchQuery->addSort('created', 'ASC');

// Remove a sort
$searchQuery->removeSort('created');

// Add a search parameter (see src/Parameter for all options)
$searchQuery->addParameter(
    new CultuurNet\SearchV3\Parameter\AudienceType(
        CultuurNet\SearchV3\Parameter\AudienceType::AUDIENCE_EDUCATION
    )
);

// Remove a search parameter (see src/Parameter for all options)
$searchQuery->removeParameter(
    new CultuurNet\SearchV3\Parameter\AudienceType(
        CultuurNet\SearchV3\Parameter\AudienceType::AUDIENCE_EDUCATION
    )
);
```

Some parameters allow multiple options and can be added more than once:
```php
$searchQuery->addParameter(new CultuurNet\SearchV3\Parameter\Label('foo'));
$searchQuery->addParameter(new CultuurNet\SearchV3\Parameter\Label('bar'));
// Will return only results that have both labels.
```

## Legacy

For legacy purposes, we also maintain a branch main-php7 to offer compability with PHP 7.4