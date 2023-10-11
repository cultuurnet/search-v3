<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class CoordinatesTest extends TestCase
{
    public function testConstructor(): void
    {
        $coordinates = new Coordinates('50.8511740', '4.3386740');

        $key = $coordinates->getKey();
        $value = $coordinates->getValue();

        $this->assertEquals('coordinates', $key);
        $this->assertEquals('50.8511740,4.3386740', $value);
    }
}
