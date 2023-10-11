<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class CalendarSummaryFormatTest extends TestCase
{
    /**
     * @test
     */
    public function it_throws_on_unsupported_type(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new CalendarSummaryFormat('markdown', 'sm');
    }

    /**
     * @test
     */
    public function it_throws_on_unsupported_size(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new CalendarSummaryFormat('html', 'xl');
    }
}
