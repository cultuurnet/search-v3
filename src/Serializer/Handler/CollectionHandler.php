<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use CultuurNet\SearchV3\Serializer\Serializer;
use CultuurNet\SearchV3\ValueObjects\Collection;
use CultuurNet\SearchV3\ValueObjects\Event;
use CultuurNet\SearchV3\ValueObjects\Organizer;
use CultuurNet\SearchV3\ValueObjects\Place;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

final class CollectionHandler implements SubscribingHandlerInterface
{
    private $contextMapping = [
        '/contexts/event' => Event::class,
        '/contexts/place' => Place::class,
        '/contexts/organizer' => Organizer::class,
    ];

    private $typeMapping = [
        'Event' => Event::class,
        'Place' => Place::class,
        'Organizer' => Organizer::class,
    ];

    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => Collection::class,
                'method' => 'deserializeCultuurCollectionFromJson',
            ],
        ];
    }

    /**
     * @param array<string, mixed> $values
     * @param array<string, mixed> $type
     */
    public function deserializeCultuurCollectionFromJson(JsonDeserializationVisitor $visitor, array $values, array $type, Context $context): ?Collection
    {
        $collection = new Collection();
        $items = [];
        $serializer = new Serializer();

        $metadata = [];
        foreach ($values as $member) {

            if (!isset($member['@context']) && !isset($member['@type'])) {
                continue;
            }

            if (isset($member['@context'])) {
                $class = $this->contextMapping[$member['@context']];
            } else {
                $class = $this->typeMapping[$member['@type']];
            }

            $object = $serializer->deserialize(json_encode($member), $class);

            $collection->addItem($object);
        }

        return $collection;
    }
}
