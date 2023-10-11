<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class AddressTest extends TestCase
{
    /**
     * @var Address
     */
    protected $address;

    public function setUp(): void
    {
        $this->address = new Address();
    }

    public function testGetAddressCountryMethod(): void
    {
        $this->address->setAddressCountry('België');

        $result = $this->address->getAddressCountry();
        $this->assertEquals('België', $result);
    }

    public function testGetAddressLocalityMethod(): void
    {
        $this->address->setAddressLocality('Brussel');

        $result = $this->address->getAddressLocality();
        $this->assertEquals('Brussel', $result);
    }

    public function testGetPostalCodeMethod(): void
    {
        $this->address->setPostalCode('1000');

        $result = $this->address->getPostalCode();
        $this->assertEquals('1000', $result);
    }

    public function testGetStreetAddressMethod(): void
    {
        $this->address->setStreetAddress('Henegouwenkaai 41-43');

        $result = $this->address->getStreetAddress();
        $this->assertEquals('Henegouwenkaai 41-43', $result);
    }
}
