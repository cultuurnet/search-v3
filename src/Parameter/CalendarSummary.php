<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use CultuurNet\SearchV3\ParameterInterface;
use CultuurNet\SearchV3\ValueObjects\CalendarSummaryFormat;

final class CalendarSummary implements ParameterInterface
{
    /**
     * @var CalendarSummaryFormat
     */
    private $format;

    public function __construct(CalendarSummaryFormat $format)
    {
        $this->format = $format;
    }

    public function getKey(): string
    {
        return 'embedCalendarSummaries';
    }

    public function getValue(): string
    {
        return $this->format->getCombined();
    }

    public function allowsMultiple(): bool
    {
        return true;
    }
}
