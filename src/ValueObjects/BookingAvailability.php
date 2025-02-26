<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Enum\Availability;
use JMS\Serializer\Annotation\Type;

final class BookingAvailability
{
    private Availability $type;

    public function getType(): ?Availability
    {
        return $this->type;
    }

    public function setType(Availability $type): void
    {
        $this->type = $type;
    }

}
