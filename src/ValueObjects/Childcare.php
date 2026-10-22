<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class Childcare
{
    /**
     * Time in H:i format.
     * @var string|null
     * @Type("string")
     */
    private $start;

    /**
     * Time in H:i format.
     * @var string|null
     * @Type("string")
     */
    private $end;

    public function __construct(?string $start = null, ?string $end = null)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getStart(): ?string
    {
        return $this->start;
    }

    public function setStart(string $start): void
    {
        $this->start = $start;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(string $end): void
    {
        $this->end = $end;
    }
}
