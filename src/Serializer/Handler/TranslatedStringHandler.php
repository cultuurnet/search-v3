<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use CultuurNet\SearchV3\ValueObjects\TranslatedString;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

final class TranslatedStringHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => TranslatedString::class,
                'method' => 'deserializeStringFromJson',
            ],
        ];
    }

    public function deserializeStringFromJson(JsonDeserializationVisitor $visitor, $value, array $type, Context $context): ?TranslatedString
    {
        $translatedString = new TranslatedString();

        $translatedString->setValues(is_array($value) ? $value : ['nl' => $value]);
        return $translatedString;
    }
}
