<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class OpeningHoursTest extends TestCase
{
    /**
     * @var OpeningHours
     */
    protected $openingHours;

    public function setUp(): void
    {
        $this->openingHours = new OpeningHours();
    }

    public function testGetDayOfWeekMethod(): void
    {
        $daysOfWeek = ['tuesday', 'wednesday', 'thursday'];
        $this->openingHours->setDaysOfWeek($daysOfWeek);

        $result = $this->openingHours->getDaysOfWeek();
        $this->assertEquals($daysOfWeek, $result);
    }

    public function testGetOpensMethod(): void
    {
        $opens = '10:00';
        $this->openingHours->setOpens($opens);

        $result = $this->openingHours->getOpens();
        $this->assertEquals($opens, $result);
    }

    public function testGetClosesMethod(): void
    {
        $closes = '18:00';
        $this->openingHours->setCloses($closes);

        $result = $this->openingHours->getCloses();
        $this->assertEquals($closes, $result);
    }
}
