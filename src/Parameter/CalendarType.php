<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class CalendarType extends AbstractParameter
{
    public const TYPE_SINGLE = 'single';
    public const TYPE_MULTIPLE = 'multiple';
    public const TYPE_PERIODIC = 'periodic';
    public const TYPE_PERMANENT = 'permanent';

    public function __construct(string $type)
    {
        $this->value = $type;
        $this->key = 'calendarType';
    }
}
