<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class MinAgeTest extends TestCase
{
    public function testConstructor(): void
    {
        $id = new MinAge(12);

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('minAge', $key);
        $this->assertEquals('12', $value);
    }
}
