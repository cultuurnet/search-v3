<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class CalendarTypeTest extends TestCase
{
    public function testConstructor(): void
    {
        $calendarType = new CalendarType('single');

        $key = $calendarType->getKey();
        $value = $calendarType->getValue();

        $this->assertEquals('calendarType', $key);
        $this->assertEquals('single', $value);
    }
}
