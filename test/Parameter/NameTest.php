<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class NameTest extends TestCase
{
    public function testConstructor(): void
    {
        $price = new Name('Foobar');

        $key = $price->getKey();
        $value = $price->getValue();

        $this->assertEquals('name', $key);
        $this->assertEquals('Foobar', $value);
    }
}
