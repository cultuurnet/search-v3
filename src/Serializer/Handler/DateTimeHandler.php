<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use DateTime;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

final class DateTimeHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => DateTime::class,
                'method' => 'deserializeDateTimeFromJson',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => DateTime::class,
                'method' => 'serializeFromObject',
            ],
        ];
    }

    public function deserializeDateTimeFromJson(JsonDeserializationVisitor $visitor, $data, array $type): ?DateTime
    {
        if ((string)$data === '') {
            return null;
        }

        if (substr($data, -1) === 'Z') {
            return DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $data);
        }

        return new DateTime($data);
    }

    public function serializeFromObject(JsonSerializationVisitor $visitor, DateTime $value, array $type, Context $context): string
    {
        return $value->format('Y-m-d\TH:i:s.u\Z');
    }
}
