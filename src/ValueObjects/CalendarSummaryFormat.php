<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use InvalidArgumentException;

final class CalendarSummaryFormat
{
    private const TYPES = [
        'text',
        'html',
    ];

    private const SIZES = [
        'xs',
        'sm',
        'md',
        'lg',
    ];

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $size;

    public function __construct(string $type, string $size)
    {
        if (!in_array($type, self::TYPES)) {
            throw new InvalidArgumentException(
                'Unsupported type ' . $type . '. Allowed values: ' . implode(', ', self::TYPES)
            );
        }

        if (!in_array($size, self::SIZES)) {
            throw new InvalidArgumentException(
                'Unsupported size ' . $size . '. Allowed values: ' . implode(', ', self::SIZES)
            );
        }

        $this->type = $type;
        $this->size = $size;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getCombined(): string
    {
        return $this->size . '-' . $this->type;
    }
}
