<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class HasOvernightStayTest extends TestCase
{
    public function testConstructor(): void
    {
        $hasOvernightStay = new HasOvernightStay(true);

        $this->assertEquals('hasOvernightStay', $hasOvernightStay->getKey());
        $this->assertEquals(true, $hasOvernightStay->getValue());
    }

    public function testConstructorWithFalse(): void
    {
        $hasOvernightStay = new HasOvernightStay(false);

        $this->assertEquals('hasOvernightStay', $hasOvernightStay->getKey());
        $this->assertEquals(false, $hasOvernightStay->getValue());
    }
}
