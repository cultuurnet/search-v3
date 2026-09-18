<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class BirthdateRange
{
    /**
     * Date in Y-m-d format.
     * @var string|null
     * @Type("string")
     */
    private $from;

    /**
     * Date in Y-m-d format.
     * @var string|null
     * @Type("string")
     */
    private $to;

    public function __construct(?string $from = null, ?string $to = null)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function getFrom(): ?string
    {
        return $this->from;
    }

    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    public function getTo(): ?string
    {
        return $this->to;
    }

    public function setTo(string $to): void
    {
        $this->to = $to;
    }
}
