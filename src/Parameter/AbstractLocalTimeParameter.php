<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use InvalidArgumentException;

abstract class AbstractLocalTimeParameter extends AbstractParameter
{
    /**
     * @param int $localTime A time of day as an HHMM integer, e.g. 1330 for 13:30.
     */
    final public function __construct(int $localTime)
    {
        if ($localTime < 0 || intdiv($localTime, 100) > 23 || $localTime % 100 > 59) {
            throw new InvalidArgumentException(
                'The time value ' . $localTime . ' is not a time of day between 0000 and 2359'
            );
        }

        $this->value = $localTime;
    }
}
