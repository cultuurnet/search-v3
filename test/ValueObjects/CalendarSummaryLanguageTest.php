<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class CalendarSummaryLanguageTest extends TestCase
{
    /**
     * @test
     */
    public function it_throws_on_unsupported_language(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new CalendarSummaryLanguage('es');
    }
}
