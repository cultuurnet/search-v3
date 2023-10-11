<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use CultuurNet\SearchV3\ValueObjects\CalendarSummary;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

final class CalendarSummaryHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => CalendarSummary::class,
                'method' => 'deserializeCalendarSummaryFromJson',
            ],
        ];
    }

    public function deserializeCalendarSummaryFromJson(JsonDeserializationVisitor $visitor, $data, array $type, Context $context): ?CalendarSummary
    {
        if (!is_array($data)) {
            return null;
        }

        return new CalendarSummary($data);
    }
}
