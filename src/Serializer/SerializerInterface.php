<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer;

use CultuurNet\SearchV3\ValueObjects\PagedCollection;
use JMS\Serializer\SerializerInterface as JMSSerializerInterface;

interface SerializerInterface
{
    /**
     * Set the JMS serializer.
     */
    public function setSerializer(JMSSerializerInterface $serializer);

    /**
     * Serialize the object to jsonld.
     */
    public function serialize($object);

    /**
     * Deserialize the jsonld.
     * @param string $jsonString
     *   The json formatted string of the object.
     * @param class-string $class
     *   Type to decode to.
     */
    public function deserialize(string $jsonString, string $class = PagedCollection::class);
}
