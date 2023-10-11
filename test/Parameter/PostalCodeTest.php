<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class PostalCodeTest extends TestCase
{
    public function testConstructor(): void
    {
        $query = new PostalCode('3000');

        $key = $query->getKey();
        $value = $query->getValue();

        $this->assertEquals('postalCode', $key);
        $this->assertEquals('3000', $value);
    }
}
