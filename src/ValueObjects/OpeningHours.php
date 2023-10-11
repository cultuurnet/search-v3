<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class OpeningHours
{
    /**
     * @var string[]
     * @Type("array<string>")
     */
    private $dayOfWeek = [];

    /**
     * @var string|null
     * @Type("string")
     */
    private $opens;

    /**
     * @var string|null
     * @Type("string")
     */
    private $closes;

    /**
     * @return string[]
     */
    public function getDaysOfWeek(): array
    {
        return $this->dayOfWeek;
    }

    /**
     * @param string[] $dayOfWeek
     */
    public function setDaysOfWeek(array $dayOfWeek): void
    {
        $this->dayOfWeek = $dayOfWeek;
    }

    public function getOpens(): ?string
    {
        return $this->opens;
    }

    public function setOpens(string $opens): void
    {
        $this->opens = $opens;
    }

    public function getCloses(): ?string
    {
        return $this->closes;
    }

    public function setCloses(string $closes): void
    {
        $this->closes = $closes;
    }
}
