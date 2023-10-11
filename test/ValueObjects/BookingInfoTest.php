<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class BookingInfoTest extends TestCase
{
    /**
     * @var BookingInfo
     */
    protected $bookingInfo;

    public function setUp(): void
    {
        $this->bookingInfo = new BookingInfo();
    }

    public function testGetPhoneMethod(): void
    {
        $this->bookingInfo->setPhone('0123456789');

        $result = $this->bookingInfo->getPhone();
        $this->assertEquals('0123456789', $result);
    }

    public function testGetEmailMethod(): void
    {
        $this->bookingInfo->setEmail('email@gmail.com');

        $result = $this->bookingInfo->getEmail();
        $this->assertEquals('email@gmail.com', $result);
    }

    public function testGetUrlMethod(): void
    {
        $this->bookingInfo->setUrl('bookingUrl.com');

        $result = $this->bookingInfo->getUrl();
        $this->assertEquals('bookingUrl.com', $result);
    }

    public function testGetUrlLabelMethod(): void
    {
        $urlLabel = new TranslatedString(['nl' => 'Koop tickets']);
        $this->bookingInfo->setUrlLabel($urlLabel);

        $result = $this->bookingInfo->getUrlLabel();
        $this->assertInstanceOf('CultuurNet\SearchV3\ValueObjects\TranslatedString', $result);
        $this->assertEquals($urlLabel, $result);
    }
}
