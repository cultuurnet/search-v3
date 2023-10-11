<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class TranslatedString
{
    /**
     * Translations
     *
     * @var string[]
     */
    private $values;

    public function __construct(array $values = [])
    {
        $this->values = $values;
    }

    public function getValueForLanguage(string $langcode): string
    {
        return $this->values[$langcode] ?? '';
    }

    /**
     * @return string[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    public function setValues(array $values): void
    {
        $this->values = $values;
    }
}
