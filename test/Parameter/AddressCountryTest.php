<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class AddressCountryTest extends TestCase
{
    public function testConstructor(): void
    {
        $query = new AddressCountry('BE');

        $key = $query->getKey();
        $value = $query->getValue();

        $this->assertEquals('addressCountry', $key);
        $this->assertEquals('BE', $value);
    }
}
