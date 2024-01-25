<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer;

use CultuurNet\SearchV3\Serializer\Handler\CalendarSummaryHandler;
use CultuurNet\SearchV3\Serializer\Handler\CollectionHandler;
use CultuurNet\SearchV3\Serializer\Handler\DateTimeHandler;
use CultuurNet\SearchV3\Serializer\Handler\FacetResultsHandler;
use CultuurNet\SearchV3\Serializer\Handler\TranslatedAddressHandler;
use CultuurNet\SearchV3\Serializer\Handler\TranslatedStringHandler;
use CultuurNet\SearchV3\ValueObjects\PagedCollection;
use Doctrine\Common\Annotations\AnnotationReader;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface as JMSSerializerInterface;
use SimpleBus\JMSSerializerBridge\SerializerMetadata;

final class Serializer implements SerializerInterface
{
    /**
     * @var JMSSerializerInterface
     */
    private $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()
            ->addMetadataDir(SerializerMetadata::directory(), SerializerMetadata::namespacePrefix())
            ->setAnnotationReader(new AnnotationReader())
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new CalendarSummaryHandler());
                $registry->registerSubscribingHandler(new CollectionHandler());
                $registry->registerSubscribingHandler(new DateTimeHandler());
                $registry->registerSubscribingHandler(new FacetResultsHandler());
                $registry->registerSubscribingHandler(new TranslatedStringHandler());
                $registry->registerSubscribingHandler(new TranslatedAddressHandler());
            })
            ->build();
    }

    public function setSerializer(JMSSerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }

    public function serialize($object): string
    {
        $serializationContext = SerializationContext::create()
            ->setSerializeNull(true);

        return $this->serializer->serialize($object, 'json', $serializationContext);
    }

    public function deserialize(string $jsonString, string $class = PagedCollection::class)
    {
        $deserializationContext = DeserializationContext::create();

        return $this->serializer->deserialize($jsonString, $class, 'json', $deserializationContext);
    }
}
