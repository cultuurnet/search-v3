<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

final class BookingAvailabilityTest extends TestCase
{
    public function testConstructor(): void
    {
        $bookingAvailability = new BookingAvailability('Available', 'https://uitverkocht.be');

        $this->assertEquals('Available', $bookingAvailability->getType());
        $this->assertEquals('https://uitverkocht.be', $bookingAvailability->getWaitingListUrl());
    }

    public function testEmptyConstructor(): void
    {
        $bookingAvailability = new BookingAvailability();

        $this->assertNull($bookingAvailability->getType());
        $this->assertNull($bookingAvailability->getWaitingListUrl());
    }

    public function testGettersAndSetters(): void
    {
        $bookingAvailability = new BookingAvailability();
        $bookingAvailability->setType('Unavailable');
        $bookingAvailability->setWaitingListUrl('https://uitverkocht.be');

        $this->assertEquals('Unavailable', $bookingAvailability->getType());
        $this->assertEquals('https://uitverkocht.be', $bookingAvailability->getWaitingListUrl());
    }

    public function testDeserializeBookingAvailability(): void
    {
        $jsonString = json_encode([
            'type' => 'Available',
            'waitingListUrl' => 'https://uitverkocht.be',
        ]);

        $serializer = new Serializer();
        /** @var BookingAvailability $bookingAvailability */
        $bookingAvailability = $serializer->deserialize($jsonString, BookingAvailability::class);

        $this->assertEquals('Available', $bookingAvailability->getType());
        $this->assertEquals('https://uitverkocht.be', $bookingAvailability->getWaitingListUrl());
    }

    public function testDeserializeBookingAvailabilityWithoutWaitingListUrl(): void
    {
        $jsonString = json_encode([
            'type' => 'Available',
        ]);

        $serializer = new Serializer();
        /** @var BookingAvailability $bookingAvailability */
        $bookingAvailability = $serializer->deserialize($jsonString, BookingAvailability::class);

        $this->assertEquals('Available', $bookingAvailability->getType());
        $this->assertNull($bookingAvailability->getWaitingListUrl());
    }
}
