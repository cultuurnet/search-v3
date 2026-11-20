<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class HasChildcareTest extends TestCase
{
    public function testConstructor(): void
    {
        $hasChildcare = new HasChildcare(true);

        $this->assertEquals('hasChildcare', $hasChildcare->getKey());
        $this->assertEquals(true, $hasChildcare->getValue());
    }

    public function testConstructorWithFalse(): void
    {
        $hasChildcare = new HasChildcare(false);

        $this->assertEquals('hasChildcare', $hasChildcare->getKey());
        $this->assertEquals(false, $hasChildcare->getValue());
    }
}
