<?php

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\Annotation\HandlerCallback;

/**
 * Provides a value object for translated addresses
 */
class TranslatedAddress
{

    /**
     * Translated addresses
     *
     * @var array
     */
    protected $addresses = [];

    /**
     * TranslatedString constructor.
     * @param array $addresses
     */
    public function __construct(array $addresses = [])
    {
        $this->addresses = $addresses;
    }

    /**
     * Get the address for a given langcode.
     *
     * @param string $langcode
     * @return \CultuurNet\SearchV3\ValueObjects\Address
     */
    public function getAddressForLanguage(string $langcode)
    {
        return $this->addresses[$langcode] ?? new Address();
    }

    /**
     * Get the translations array.
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Set the translations array.
     */
    public function setAddresses(array $addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(JsonDeserializationVisitor $visitor, $addressArray, DeserializationContext $context)
    {
        foreach($addressArray as $key => $address) {
            $addressObject = new Address();
            $addressObject->setAddressCountry($address['addressCountry']);
            $addressObject->setAddressLocality($address['addressLocality']);
            $addressObject->setPostalCode($address['postalCode']);
            $addressObject->setStreetAddress($address['streetAddress']);
            $this->addresses[$key] = $addressObject;
        }
    }
}
