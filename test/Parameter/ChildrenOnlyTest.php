<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class ChildrenOnlyTest extends TestCase
{
    public function testConstructor(): void
    {
        $childrenOnly = new ChildrenOnly(true);

        $this->assertEquals('childrenOnly', $childrenOnly->getKey());
        $this->assertEquals(true, $childrenOnly->getValue());
    }

    public function testConstructorWithFalse(): void
    {
        $childrenOnly = new ChildrenOnly(false);

        $this->assertEquals('childrenOnly', $childrenOnly->getKey());
        $this->assertEquals(false, $childrenOnly->getValue());
    }
}
