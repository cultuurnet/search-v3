<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class BookingAvailability
{
    /**
     * @var string|null
     * @Type("string")
     */
    private $type;

    /**
     * Only present on sub events.
     * @var string|null
     * @Type("string")
     */
    private $waitingListUrl;

    public function __construct(?string $type = null, ?string $waitingListUrl = null)
    {
        $this->type = $type;
        $this->waitingListUrl = $waitingListUrl;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getWaitingListUrl(): ?string
    {
        return $this->waitingListUrl;
    }

    public function setWaitingListUrl(?string $waitingListUrl): void
    {
        $this->waitingListUrl = $waitingListUrl;
    }
}
