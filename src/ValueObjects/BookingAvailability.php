<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Enum\Availability;
use JMS\Serializer\Annotation\Type;

final class BookingAvailability
{
    private Availability $type;

    /**
     * @var int|null
     * @Type("integer")
     */
    private ?int $capacity = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    private ?int $remainingCapacity = null;

    public function getType(): ?Availability
    {
        return $this->type;
    }

    public function setType(Availability $type): void
    {
        $this->type = $type;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(?int $capacity): void
    {
        $this->capacity = $capacity;
    }

    public function getRemainingCapacity(): ?int
    {
        return $this->remainingCapacity;
    }

    public function setRemainingCapacity(?int $remainingCapacity): void
    {
        $this->remainingCapacity = $remainingCapacity;
    }
}
