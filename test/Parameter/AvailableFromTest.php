<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use DateTime;
use PHPUnit\Framework\TestCase;

final class AvailableFromTest extends TestCase
{
    public function testConstructor(): void
    {
        $dateTime = new DateTime('2017-04-11T12:08:01+01:00');
        $availableFrom = new AvailableFrom($dateTime);

        $key = $availableFrom->getKey();
        $value = $availableFrom->getValue();

        $this->assertEquals('availableFrom', $key);
        $this->assertEquals('2017-04-11T12:08:01+01:00', $value);
    }

    public function testFactoryMethodWithAtomString(): void
    {
        $dateTime = '2017-04-11T12:08:01+01:00';
        $availableFrom = AvailableFrom::createFromAtomString($dateTime);

        $key = $availableFrom->getKey();
        $value = $availableFrom->getValue();

        $this->assertEquals('availableFrom', $key);
        $this->assertEquals('2017-04-11T12:08:01+01:00', $value);
    }

    public function testWithWildcard(): void
    {
        $id = AvailableFrom::wildcard();

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('availableFrom', $key);
        $this->assertEquals('*', $value);
    }
}
