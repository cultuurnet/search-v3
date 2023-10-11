<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class MaxAgeTest extends TestCase
{
    public function testConstructor(): void
    {
        $id = new MaxAge(16);

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('maxAge', $key);
        $this->assertEquals('16', $value);
    }
}
