<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

final class Event extends Offer
{
    /**
     * @var Place|null
     * @Type("CultuurNet\SearchV3\ValueObjects\Place")
     */
    private $location;

    /**
     * @var PriceInfo[]
     * @Type("array<CultuurNet\SearchV3\ValueObjects\PriceInfo>")
     */
    private $priceInfo = [];

    /**
     * @var BookingInfo|null
     * @Type("CultuurNet\SearchV3\ValueObjects\BookingInfo")
     */
    private $bookingInfo;

    /**
     * Sub events exist if an event is organised on multiple days.
     * @var Event[]
     * @Type("array<CultuurNet\SearchV3\ValueObjects\Event>")
     * @SerializedName("subEvent")
     */
    private $subEvents = [];

    /**
     * @var string
     * @Type("string")
     */
    private $attendanceMode = 'offline';

    /**
     * @var string|null
     * @Type("string")
     */
    private $onlineUrl;

    /**
     * @var TranslatedFaq[]
     * @Type("array<CultuurNet\SearchV3\ValueObjects\TranslatedFaq>")
     */
    private $faqs = [];

    /**
     * @var BirthdateRange|null
     * @Type("CultuurNet\SearchV3\ValueObjects\BirthdateRange")
     */
    private $birthdateRange;

    /**
     * @var bool
     * @Type("boolean")
     */
    private $childrenOnly = false;

    /**
     * @var string[]
     * @Type("array<string>")
     */
    private $departurePlaces = [];

    public function getLocation(): ?Place
    {
        return $this->location;
    }

    public function setLocation(Place $location): void
    {
        $this->location = $location;
    }

    public function getSubEvents(): array
    {
        return $this->subEvents;
    }

    public function setSubEvents(array $subEvents): void
    {
        $this->subEvents = $subEvents;
    }

    /**
     * @return PriceInfo[]
     */
    public function getPriceInfo(): array
    {
        return $this->priceInfo;
    }

    /**
     * @param PriceInfo[] $priceInfo
     */
    public function setPriceInfo(array $priceInfo): void
    {
        $this->priceInfo = $priceInfo;
    }

    public function getBookingInfo(): ?BookingInfo
    {
        return $this->bookingInfo;
    }

    public function setBookingInfo(BookingInfo $bookingInfo): void
    {
        $this->bookingInfo = $bookingInfo;
    }

    public function getAttendanceMode(): string
    {
        return $this->attendanceMode;
    }

    public function setAttendanceMode(string $attendanceMode): void
    {
        $this->attendanceMode = $attendanceMode;
    }

    public function getOnlineUrl(): ?string
    {
        return $this->onlineUrl;
    }

    public function setOnlineUrl(?string $onlineUrl): void
    {
        $this->onlineUrl = $onlineUrl;
    }

    /**
     * @return TranslatedFaq[]
     */
    public function getFaqs(): array
    {
        return $this->faqs;
    }

    /**
     * @param TranslatedFaq[] $faqs
     */
    public function setFaqs(array $faqs): void
    {
        $this->faqs = $faqs;
    }

    public function getBirthdateRange(): ?BirthdateRange
    {
        return $this->birthdateRange;
    }

    public function setBirthdateRange(BirthdateRange $birthdateRange): void
    {
        $this->birthdateRange = $birthdateRange;
    }

    /**
     * @return string[]
     */
    public function getDeparturePlaces(): array
    {
        return $this->departurePlaces;
    }

    /**
     * @param string[] $departurePlaces
     */
    public function setDeparturePlaces(array $departurePlaces): void
    {
        $this->departurePlaces = $departurePlaces;
    }

    public function isChildrenOnly(): bool
    {
        return (bool) $this->childrenOnly;
    }

    public function setChildrenOnly(bool $childrenOnly): void
    {
        $this->childrenOnly = $childrenOnly;
    }

    public function isAttendanceModeOnline(): bool
    {
        return null !== $this->getAttendanceMode() && $this->getAttendanceMode() === 'online';
    }

    public function isAttendanceModeOffline(): bool
    {
        return null !== $this->getAttendanceMode() && $this->getAttendanceMode() === 'offline';
    }

    public function isAttendanceModeMixed(): bool
    {
        return null !== $this->getAttendanceMode() && $this->getAttendanceMode() === 'mixed';
    }
}
