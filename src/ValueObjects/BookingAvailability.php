<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Enum\Availability;

final class BookingAvailability
{
    private Availability $type;

    /**
     * Only present on sub events.
     */
    private ?string $waitingListUrl = null;

    public function getType(): ?Availability
    {
        return $this->type;
    }

    public function setType(Availability $type): void
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
