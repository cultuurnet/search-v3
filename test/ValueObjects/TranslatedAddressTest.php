<?php

namespace CultuurNet\SearchV3\Test\ValueObjects;

use CultuurNet\SearchV3\ValueObjects\Address;
use CultuurNet\SearchV3\ValueObjects\TranslatedAddress;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;

class TranslatedAddressTest extends \PHPUnit_Framework_TestCase
{

    protected function getAddress()
    {
        $address = new Address();
        $address->setStreetAddress('Test straat 123');
        $address->setAddressLocality('Brussel');
        $address->setPostalCode('1000');
        $address->setAddressCountry('BE');

        return $address;
    }

    /**
     * Test the getValueForLanguage method.
     */
    public function testGetAddressForLanguage()
    {
        $address = $this->getAddress();

        $translatedAddress = new TranslatedAddress(['nl' => $address]);
        $this->assertEquals($address, $translatedAddress->getAddressForLanguage('nl'));
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $address = $this->getAddress();

        $translatedAddress = new TranslatedAddress();
        $translatedAddress->setAddresses(['nl' => $address]);
        $this->assertEquals(['nl' => $address], $translatedAddress->getAddresses());
    }

    /**
     * Test the deserialize method.
     */
    public function testDeserializeMethod()
    {
        $visitor = $this->getMockBuilder(JsonDeserializationVisitor::class)
            ->disableOriginalConstructor()
            ->getMock();

        $context = $this->getMockBuilder(DeserializationContext::class)
            ->disableOriginalConstructor()
            ->getMock();

        $addressNl = [
            'addressCountry' => 'BE',
            'addressLocality' => 'Brussel',
            'postalCode' => '1000',
            'streetAddress' => 'Test straat 123'
        ];
        $addressEn = [
            'addressCountry' => 'BE',
            'addressLocality' => 'Brussels',
            'postalCode' => '1000',
            'streetAddress' => 'Test street 123'
        ];
        $addressArray = [
            'nl' => $addressNl,
            'en' => $addressEn
        ];

        $expectedAddressNl = $this->getAddress();
        $expectedAddressEn = $this->getAddress();
        $expectedAddressEn->setStreetAddress('Test street 123');
        $expectedAddressEn->setAddressLocality('Brussels');

        $translatedAddress = new TranslatedAddress();
        $translatedAddress->deserializeFromJson($visitor, $addressArray, $context);
        $this->assertEquals([
            'nl' => $expectedAddressNl,
            'en' => $expectedAddressEn
        ], $translatedAddress->getAddresses());
    }
}
