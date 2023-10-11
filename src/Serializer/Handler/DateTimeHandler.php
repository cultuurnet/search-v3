<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use DateTime;
use JMS\Serializer\Handler\DateHandler;
use JMS\Serializer\JsonDeserializationVisitor;

final class DateTimeHandler extends DateHandler
{
    public function deserializeDateTimeFromJson(JsonDeserializationVisitor $visitor, $data, array $type): ?DateTime
    {
        if ((string)$data === '') {
            return null;
        }

        if (substr($data, -1) === 'Z') {
            $type['params'][0] = 'Y-m-d\TH:i:s.u\Z';
        }

        return parent::deserializeDateTimeFromJson($visitor, $data, $type);
    }
}
