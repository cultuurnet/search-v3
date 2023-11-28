<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use CultuurNet\SearchV3\ValueObjects\Address;
use CultuurNet\SearchV3\ValueObjects\TranslatedAddress;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

final class TranslatedAddressHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => TranslatedAddress::class,
                'method' => 'deserializeStringFromJson',
            ],
          [
            'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
            'format' => 'json',
            'type' => TranslatedAddress::class,
            'method' => 'serializeFromObject',
          ],
        ];
    }

    public function deserializeStringFromJson(JsonDeserializationVisitor $visitor, $values, array $type, Context $context): TranslatedAddress
    {
        $translatedAddress = new TranslatedAddress();

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $address = new Address(
                    $value['addressCountry'],
                    $value['addressLocality'],
                    $value['postalCode'],
                    $value['streetAddress']
                );
                $translatedAddress->addAddress($key, $address);
            }
        }

        // Some properties are not translated yet in the api. We save these as nl.
        if (empty($address) && !empty($values)) {
            $address = new Address(
                $values['addressCountry'] ?? null,
                $values['addressLocality'] ?? null,
                $values['postalCode'] ?? null,
                $values['streetAddress'] ?? null
            );
            $translatedAddress->addAddress('nl', $address);
        }

        return $translatedAddress;
    }

  public function serializeFromObject(JsonSerializationVisitor $visitor, TranslatedAddress $value, array $type = NULL, Context $context): array
  {
    return $visitor->visitArray($value->getAddresses(), []);
  }
}
