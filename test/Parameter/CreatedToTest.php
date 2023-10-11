<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use DateTime;
use PHPUnit\Framework\TestCase;

final class CreatedToTest extends TestCase
{
    public function testConstructor(): void
    {
        $dateTime = new DateTime('2017-12-21T10:00:00+01:00');
        $createdTo = new CreatedTo($dateTime);

        $key = $createdTo->getKey();
        $value = $createdTo->getValue();

        $this->assertEquals('createdTo', $key);
        $this->assertEquals('2017-12-21T10:00:00+01:00', $value);
    }

    public function testFactoryMethodWithAtomString(): void
    {
        $dateTime = '2017-12-21T10:00:00+01:00';
        $createdTo = CreatedTo::createFromAtomString($dateTime);

        $key = $createdTo->getKey();
        $value = $createdTo->getValue();

        $this->assertEquals('createdTo', $key);
        $this->assertEquals('2017-12-21T10:00:00+01:00', $value);
    }

    public function testWithWildcard(): void
    {
        $id = CreatedTo::wildcard();

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('createdTo', $key);
        $this->assertEquals('*', $value);
    }
}
