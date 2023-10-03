<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use DateTime;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

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
}
