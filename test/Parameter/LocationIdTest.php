<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class LocationIdTest extends TestCase
{
    public function testConstructor(): void
    {
        $id = new LocationId('b8bff8fa-988a-44db-8dd8-70bef77f3933');

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('locationId', $key);
        $this->assertEquals('b8bff8fa-988a-44db-8dd8-70bef77f3933', $value);
    }
}
