<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use InvalidArgumentException;

final class CalendarSummary
{
    /**
     * Associative array in the form of [language][type][format]
     * @var array<string,array<string,array<string,string>>>
     */
    private $summaries;

    public function __construct(array $summaries)
    {
        $this->summaries = $summaries;
    }

    public function getSummary(
        CalendarSummaryLanguage $language,
        CalendarSummaryFormat $format
    ): string {
        if (!isset($this->summaries[$language->getValue()])) {
            throw new InvalidArgumentException('The language ' . $language->getValue() . ' is not provided');
        }

        if (!isset($this->summaries[$language->getValue()][$format->getType()])) {
            throw new InvalidArgumentException('The type ' . $format->getType() . ' is not provided');
        }

        if (!isset($this->summaries[$language->getValue()][$format->getType()][$format->getSize()])) {
            throw new InvalidArgumentException('The size ' . $format->getSize() . ' is not provided');
        }

        return $this->summaries[$language->getValue()][$format->getType()][$format->getSize()];
    }
}
