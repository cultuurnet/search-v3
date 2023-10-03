<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3;

use CultuurNet\SearchV3\Serializer\SerializerInterface;
use CultuurNet\SearchV3\ValueObjects\PagedCollection;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

final class SearchClientTest extends TestCase
{
    /**
     * @var ClientInterface | MockObject
     */
    protected $client;

    /**
     * @var SerializerInterface | MockObject
     */
    protected $serializer;

    protected $searchClient;

    public function setUp(): void
    {
        $this->client = $this->createMock(ClientInterface::class);
        $this->serializer = $this->createMock(SerializerInterface::class);

        // Use getters instead of properties for better type checking in PHPStan
        $this->searchClient = new SearchClient($this->getClient(), $this->getSerializer());
    }

    private function getClient(): ClientInterface
    {
        return $this->client;
    }

    private function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    public function provideSearchQueryMock(): SearchQueryInterface
    {
        /** @var SearchQueryInterface|MockObject $searchQueryMock */
        $searchQueryMock = $this->getMockBuilder(SearchQueryInterface::class)
            ->getMock();
        $searchQueryMock->expects($this->once())
            ->method('toArray')
            ->willReturn(['foo' => 'bar']);

        return $searchQueryMock;
    }

    public function provideResponseMockup(): ResponseInterface
    {
        /** @var ResponseInterface|MockObject $response */
        $response = $this->getMockBuilder(ResponseInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        /** @var Stream|MockObject $stream */
        $stream = $this->getMockBuilder(Stream::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stream->expects($this->once())
            ->method('getContents')
            ->willReturn('test response');

        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($stream);

        return $response;
    }

    /**
     * Test the setter and getter of the search client.
     */
    public function testSetClient(): void
    {
        $client = new Client(['headers' => ['lorem' => 'ipsum']]);
        $this->searchClient->setClient($client);
        $this->assertEquals($client, $this->searchClient->getClient());
    }

    public function testSearchEventsMethod(): void
    {
        $options = ['query' => ['foo' => 'bar']];

        $searchQueryMock = $this->provideSearchQueryMock();
        $pagedCollection = new PagedCollection();
        $response = $this->provideResponseMockup();

        $this->serializer->expects($this->once())
            ->method('deserialize')
            ->with('test response')
            ->willReturn($pagedCollection);

        $this->client->expects($this->once())
            ->method('request')
            ->with('GET', 'events', $options)
            ->willReturn($response);

        $queryResult = $this->searchClient->searchEvents($searchQueryMock);
        $this->assertEquals($pagedCollection, $queryResult);
    }

    public function testSearchPlacesMethod(): void
    {
        $options = ['query' => ['foo' => 'bar']];

        $searchQueryMock = $this->provideSearchQueryMock();
        $pagedCollection = new PagedCollection();
        $response = $this->provideResponseMockup();

        $this->serializer->expects($this->once())
            ->method('deserialize')
            ->with('test response')
            ->willReturn($pagedCollection);

        $this->client->expects($this->once())
            ->method('request')
            ->with('GET', 'places', $options)
            ->willReturn($response);

        $queryResult = $this->searchClient->searchPlaces($searchQueryMock);
        $this->assertEquals($pagedCollection, $queryResult);
    }

    public function testSearchOfferMethod(): void
    {
        $options = ['query' => ['foo' => 'bar']];
        $pagedCollection = new PagedCollection();
        $searchQueryMock = $this->provideSearchQueryMock();

        $response = $this->provideResponseMockup();

        $this->serializer->expects($this->once())
            ->method('deserialize')
            ->with('test response')
            ->willReturn($pagedCollection);

        $this->client->expects($this->once())
            ->method('request')
            ->with('GET', 'offers', $options)
            ->willReturn($response);

        $queryResult = $this->searchClient->searchOffers($searchQueryMock);
        $this->assertEquals($pagedCollection, $queryResult);
    }
}
