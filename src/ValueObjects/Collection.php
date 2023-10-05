<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\HandlerCallback;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\TypeParser;

final class Collection
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

    private $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(
        JsonDeserializationVisitor $visitor,
        array $values,
        DeserializationContext $context
    ): void {
        $deserializationContext = DeserializationContext::create()
            ->setSerializeNull(true);

        $memberVisitor = clone $visitor;

        $deserializationContext->initialize(
            'json',
            $memberVisitor,
            $context->getNavigator(),
            $context->getMetadataFactory()
        );

        $typeParser = new TypeParser();
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

            $metadata[$class] = $metadata[$class] ??
                $deserializationContext->getMetadataFactory()->getMetadataForClass($class);

            $object = new $class();
            $memberVisitor->startVisitingObject(
                $metadata[$class],
                $object,
                $typeParser->parse($class),
                $deserializationContext
            );

            $properties = $metadata[$class]->propertyMetadata;
            foreach ($properties as $property) {
                $memberVisitor->visitProperty($property, $member, $deserializationContext);
            }

            $this->items[] = $object;
        }
    }
}
