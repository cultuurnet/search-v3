<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use InvalidArgumentException;

final class CalendarSummaryLanguage
{
    private const LANGUAGES = [
        'nl',
        'fr',
        'de',
        'en',
    ];

    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::LANGUAGES)) {
            throw new InvalidArgumentException(
                'Unsupported language ' . $value . '. Allowed values: ' . implode(', ', self::LANGUAGES)
            );
        }

        $this->value = $value;
    }

    public static function nl(): self
    {
        return new self('nl');
    }

    public static function fr(): self
    {
        return new self('fr');
    }

    public static function de(): self
    {
        return new self('de');
    }

    public static function en(): self
    {
        return new self('en');
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
