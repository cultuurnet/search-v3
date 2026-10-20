<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class RecurringOnDayOfWeekTest extends TestCase
{
    public function testConstructor(): void
    {
        $parameter = new RecurringOnDayOfWeek(RecurringOnDayOfWeek::FRIDAY);

        $this->assertEquals('recurringOnDayOfWeek', $parameter->getKey());
        $this->assertEquals('friday', $parameter->getValue());
    }

    public function testConstructorWithMultipleDays(): void
    {
        $parameter = new RecurringOnDayOfWeek(RecurringOnDayOfWeek::FRIDAY, RecurringOnDayOfWeek::SATURDAY);

        $this->assertEquals('friday,saturday', $parameter->getValue());
    }

    public function testConstructorWithWrongDay(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new RecurringOnDayOfWeek('not a valid day');
    }

    public function testConstructorWithoutDays(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new RecurringOnDayOfWeek();
    }
}
