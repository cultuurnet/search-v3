<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use DateTime;
use PHPUnit\Framework\TestCase;

final class CreatedFromTest extends TestCase
{
    public function testConstructor(): void
    {
        $dateTime = new DateTime('2017-12-21T10:00:00+01:00');
        $createdFrom = new CreatedFrom($dateTime);

        $key = $createdFrom->getKey();
        $value = $createdFrom->getValue();

        $this->assertEquals('createdFrom', $key);
        $this->assertEquals('2017-12-21T10:00:00+01:00', $value);
    }

    public function testFactoryMethodWithAtomString(): void
    {
        $dateTime = '2017-12-21T10:00:00+01:00';
        $createdFrom = CreatedFrom::createFromAtomString($dateTime);

        $key = $createdFrom->getKey();
        $value = $createdFrom->getValue();

        $this->assertEquals('createdFrom', $key);
        $this->assertEquals('2017-12-21T10:00:00+01:00', $value);
    }

    public function testWithWildcard(): void
    {
        $id = CreatedFrom::wildcard();

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('createdFrom', $key);
        $this->assertEquals('*', $value);
    }
}
