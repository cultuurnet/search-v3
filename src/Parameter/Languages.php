<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use InvalidArgumentException;
use ReflectionClass;

final class Languages extends AbstractParameter
{
    public const LANG_NL = 'nl';
    public const LANG_FR = 'fr';
    public const LANG_DE = 'de';
    public const LANG_EN = 'en';

    public function __construct(string $language)
    {
        if (in_array($language, self::getConstants(), true)) {
            $this->value = $language;
            $this->key = 'languages';
        } else {
            throw new InvalidArgumentException('Invalid language parameter for ' . __CLASS__ . ' constructor');
        }
    }

    public function allowsMultiple(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    private static function getConstants(): array
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
