<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class DistanceTest extends TestCase
{
    public function testConstructor(): void
    {
        $distance = new Distance(15, Distance::UNIT_KILOMETER);

        $key = $distance->getKey();
        $value = $distance->getValue();

        $this->assertEquals('distance', $key);
        $this->assertEquals('15km', $value);
    }

    public function testConstructorWithWrongUnit(): void
    {
        $this->expectException(\Exception::class);
        new Distance(15, 'wrong unit');
    }
}
