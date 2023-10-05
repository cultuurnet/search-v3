<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\HandlerCallback;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;

final class TranslatedAddress
{
    /**
     * @var Address[]
     */
    private $addresses = [];

    /**
     * @return Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param Address[] $addresses
     */
    public function setAddresses(array $addresses): void
    {
        $this->addresses = $addresses;
    }

    /**
    * @param string $langcode
    * @param Address $address
    */
    public function setAddress(string $langcode, Address $address): void
    {
      $this->addresses[$langcode] = $address;
    }

    public function getAddressForLanguage(string $langcode): ?Address
    {
        return $this->addresses[$langcode] ?? null;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(
        JsonDeserializationVisitor $visitor,
        array $values,
        DeserializationContext $context
    ): void {
        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $this->addresses[$key] = new Address(
                    $value['addressCountry'],
                    $value['addressLocality'],
                    $value['postalCode'],
                    $value['streetAddress']
                );
            }
        }

        // Some properties are not translated yet in the api. We save these as nl.
        if (empty($this->addresses) && !empty($values)) {
            $this->addresses['nl'] = new Address(
                $values['addressCountry'] ?? null,
                $values['addressLocality'] ?? null,
                $values['postalCode'] ?? null,
                $values['streetAddress'] ?? null
            );
        }
    }

    /**
     * @HandlerCallback("json", direction = "serialization")
     */
    public function serializeFromObject(JsonSerializationVisitor $visitor, array $type = NULL, SerializationContext $context): array {
      return $visitor->visitArray($this->addresses, [], $context);
    }
}
