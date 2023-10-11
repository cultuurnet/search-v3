<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use DateTime;
use PHPUnit\Framework\TestCase;

final class ModifiedToTest extends TestCase
{
    public function testConstructor(): void
    {
        $dateTime = new DateTime('2017-12-21T10:00:00+01:00');
        $modifiedTo = new ModifiedTo($dateTime);

        $key = $modifiedTo->getKey();
        $value = $modifiedTo->getValue();

        $this->assertEquals('modifiedTo', $key);
        $this->assertEquals('2017-12-21T10:00:00+01:00', $value);
    }

    public function testFactoryMethodWithAtomString(): void
    {
        $dateTime = '2017-12-21T10:00:00+01:00';
        $modifiedTo = ModifiedTo::createFromAtomString($dateTime);

        $key = $modifiedTo->getKey();
        $value = $modifiedTo->getValue();

        $this->assertEquals('modifiedTo', $key);
        $this->assertEquals('2017-12-21T10:00:00+01:00', $value);
    }

    public function testWithWildcard(): void
    {
        $id = ModifiedTo::wildcard();

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('modifiedTo', $key);
        $this->assertEquals('*', $value);
    }
}
