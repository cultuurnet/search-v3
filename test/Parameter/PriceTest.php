<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class PriceTest extends TestCase
{
    public function testConstructor(): void
    {
        $price = new Price(5.46);

        $key = $price->getKey();
        $value = $price->getValue();

        $this->assertEquals('price', $key);
        $this->assertEquals(5.46, $value);
    }
}
