<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class EventTest extends TestCase
{
    /**
     * @var Event
     */
    protected $event;

    public function setUp(): void
    {
        $this->event = new Event();
    }

    public function testNameGettersAndSetters(): void
    {
        $name = new TranslatedString(['nl' => 'event name']);
        $this->event->setName($name);
        $this->assertEquals($name, $this->event->getName());
    }

    public function testGetLocationMethod(): void
    {
        $location = new Place();
        $this->event->setLocation($location);

        $result = $this->event->getLocation();
        $this->assertEquals($location, $result);
    }

    public function testGetSubEventsMethod(): void
    {
        $this->event->setSubEvents([new Event(), new Event()]);

        $result = $this->event->getSubEvents();
        $this->assertEquals([new Event(), new Event()], $result);
    }

    public function testGetPriceInfoMethod(): void
    {
        $priceInfo = new PriceInfo();
        $this->event->setPriceInfo([$priceInfo]);

        $result = $this->event->getPriceInfo();
        $this->assertEquals([$priceInfo], $result);
    }

    public function testGetBookingInfoMethod(): void
    {
        $bookingInfo = new BookingInfo();
        $this->event->setBookingInfo($bookingInfo);

        $result = $this->event->getBookingInfo();
        $this->assertEquals($bookingInfo, $result);
    }
}
