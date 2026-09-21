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

    public function testGetFaqsMethod(): void
    {
        $faq = new TranslatedFaqs();
        $faq->addFaq('nl', new Faq('Hoe kom ik er?', '<p>Wandelen!</p>'));

        $this->event->setFaqs([$faq]);

        $this->assertEquals([$faq], $this->event->getFaqs());
    }

    public function testGetDeparturePlacesMethod(): void
    {
        $departurePlaces = [
            'https://io.uitdatabank.be/places/ec797c9e-f9b8-4eab-80c4-21a52bc439c2',
            'https://io.uitdatabank.be/places/4e62b521-f862-4eba-a71e-d7729d09619b',
        ];

        $this->event->setDeparturePlaces($departurePlaces);

        $this->assertEquals($departurePlaces, $this->event->getDeparturePlaces());
    }

    public function testDeparturePlacesDefaultsToEmptyArray(): void
    {
        $this->assertEquals([], $this->event->getDeparturePlaces());
    }

    public function testChildrenOnlyDefaultsToFalse(): void
    {
        $this->assertFalse($this->event->isChildrenOnly());
    }

    public function testChildrenOnlyGetterAndSetter(): void
    {
        $this->event->setChildrenOnly(true);

        $this->assertTrue($this->event->isChildrenOnly());
    }

    public function testGetBirthdateRangeMethod(): void
    {
        $birthdateRange = new BirthdateRange('2021-09-18', '2022-09-17');

        $this->event->setBirthdateRange($birthdateRange);

        $this->assertEquals($birthdateRange, $this->event->getBirthdateRange());
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
