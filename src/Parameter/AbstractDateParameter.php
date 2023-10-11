<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use DateTimeInterface;
use InvalidArgumentException;

abstract class AbstractDateParameter extends AbstractParameter
{
    final public function __construct(DateTimeInterface $dateTime)
    {
        $this->value = $dateTime->format(DATE_ATOM);
    }

    public static function createFromAtomString(string $value): self
    {
        $dateTime = \DateTimeImmutable::createFromFormat(DATE_ATOM, $value);
        if ($dateTime === false) {
            throw new InvalidArgumentException('Could not parse ' . $value . ' as a date in the atom format');
        }
        return new static($dateTime);
    }

    public static function wildcard(): self
    {
        $parameter = new static(new \DateTimeImmutable());
        $parameter->value = '*';
        return $parameter;
    }
}
