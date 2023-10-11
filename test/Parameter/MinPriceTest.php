<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class MinPriceTest extends TestCase
{
    public function testConstructor(): void
    {
        $price = new MinPrice(9.99);

        $key = $price->getKey();
        $value = $price->getValue();

        $this->assertEquals('minPrice', $key);
        $this->assertEquals(9.99, $value);
    }
}
