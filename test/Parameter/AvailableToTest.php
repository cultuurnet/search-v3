<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use DateTime;
use PHPUnit\Framework\TestCase;

final class AvailableToTest extends TestCase
{
    public function testConstructor(): void
    {
        $dateTime = new DateTime('2017-04-11T12:08:01+01:00');
        $availableTo = new AvailableTo($dateTime);

        $key = $availableTo->getKey();
        $value = $availableTo->getValue();

        $this->assertEquals('availableTo', $key);
        $this->assertEquals('2017-04-11T12:08:01+01:00', $value);
    }

    public function testFactoryMethodWithAtomString(): void
    {
        $dateTime = '2017-04-11T12:08:01+01:00';
        $availableFrom = AvailableTo::createFromAtomString($dateTime);

        $key = $availableFrom->getKey();
        $value = $availableFrom->getValue();

        $this->assertEquals('availableTo', $key);
        $this->assertEquals('2017-04-11T12:08:01+01:00', $value);
    }

    public function testWithWildcard(): void
    {
        $id = AvailableTo::wildcard();

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('availableTo', $key);
        $this->assertEquals('*', $value);
    }
}
