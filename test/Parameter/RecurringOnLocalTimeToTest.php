<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class RecurringOnLocalTimeToTest extends TestCase
{
    public function testConstructor(): void
    {
        $parameter = new RecurringOnLocalTimeTo(1300);

        $this->assertEquals('recurringOnLocalTimeTo', $parameter->getKey());
        $this->assertEquals(1300, $parameter->getValue());
    }

    public function testConstructorWithMidnight(): void
    {
        $this->assertEquals(0, (new RecurringOnLocalTimeTo(0))->getValue());
    }

    public function testConstructorWithLastMinuteOfTheDay(): void
    {
        $this->assertEquals(2359, (new RecurringOnLocalTimeTo(2359))->getValue());
    }

    public function testConstructorWithHourOutOfRange(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new RecurringOnLocalTimeTo(2400);
    }

    public function testConstructorWithMinutesOutOfRange(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new RecurringOnLocalTimeTo(1160);
    }

    public function testConstructorWithNegativeTime(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new RecurringOnLocalTimeTo(-1);
    }
}
