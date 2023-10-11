<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use DateTime;
use JMS\Serializer\Annotation\Type;

final class BookingInfo
{
    /**
     * @var string|null
     * @Type("string")
     */
    private $phone;

    /**
     * @var string|null
     * @Type("string")
     */
    private $email;

    /**
     * @var string|null
     * @Type("string")
     */
    private $url;

    /**
     * @var TranslatedString|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedString")
     */
    private $urlLabel;

    /**
     * @var DateTime|null
     * @Type("DateTime")
     */
    private $availabilityStarts;

    /**
     * @var DateTime|null
     * @Type("DateTime")
     */
    private $availabilityEnds;

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getUrlLabel(): ?TranslatedString
    {
        return $this->urlLabel;
    }

    public function setUrlLabel(TranslatedString $urlLabel): void
    {
        $this->urlLabel = $urlLabel;
    }

    public function getAvailabilityStarts(): ?DateTime
    {
        return $this->availabilityStarts;
    }

    public function setAvailabilityStarts(DateTime $availabilityStarts): void
    {
        $this->availabilityStarts = $availabilityStarts;
    }

    public function getAvailabilityEnds(): ?DateTime
    {
        return $this->availabilityEnds;
    }

    public function setAvailabilityEnds(DateTime $availabilityEnds): void
    {
        $this->availabilityEnds = $availabilityEnds;
    }
}
