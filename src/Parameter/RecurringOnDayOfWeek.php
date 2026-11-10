<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use InvalidArgumentException;

final class RecurringOnDayOfWeek extends AbstractParameter
{
    public const MONDAY = 'monday';
    public const TUESDAY = 'tuesday';
    public const WEDNESDAY = 'wednesday';
    public const THURSDAY = 'thursday';
    public const FRIDAY = 'friday';
    public const SATURDAY = 'saturday';
    public const SUNDAY = 'sunday';

    private const DAYS_OF_WEEK = [
        self::MONDAY,
        self::TUESDAY,
        self::WEDNESDAY,
        self::THURSDAY,
        self::FRIDAY,
        self::SATURDAY,
        self::SUNDAY,
    ];

    /**
     * The API only accepts a comma-separated list for this parameter (not the array syntax),
     * so multiple days are passed to a single instance instead of adding the parameter multiple times.
     */
    public function __construct(string ...$daysOfWeek)
    {
        if ($daysOfWeek === []) {
            throw new InvalidArgumentException('At least one day of week is required for ' . __CLASS__);
        }

        foreach ($daysOfWeek as $dayOfWeek) {
            if (!in_array($dayOfWeek, self::DAYS_OF_WEEK, true)) {
                throw new InvalidArgumentException('Invalid day of week "' . $dayOfWeek . '" for ' . __CLASS__);
            }
        }

        $this->value = implode(',', $daysOfWeek);
        $this->key = 'recurringOnDayOfWeek';
    }
}
