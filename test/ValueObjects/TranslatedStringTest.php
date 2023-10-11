<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use PHPUnit\Framework\TestCase;

final class TranslatedStringTest extends TestCase
{
    /**
     * Test the getValueForLanguage method.
     */
    public function testGetValueForLanguage(): void
    {
        $string = new TranslatedString(['nl' => 'test nl']);
        $this->assertEquals('test nl', $string->getValueForLanguage('nl'));
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters(): void
    {
        $string = new TranslatedString();
        $string->setValues(['nl' => 'test nl']);
        $this->assertEquals(['nl' => 'test nl'], $string->getValues());
    }

    /**
     * Test the deserialize method.
     */
    public function testDeserializeMethod(): void
    {
        /** @var JsonDeserializationVisitor $visitor */
        $visitor = $this->createMock(JsonDeserializationVisitor::class);

        /** @var DeserializationContext $context */
        $context = $this->createMock(DeserializationContext::class);

        $string = new TranslatedString();
        $string->deserializeFromJson($visitor, 'value', $context);
        $this->assertEquals(['nl' => 'value'], $string->getValues());

        $string = new TranslatedString();
        $string->deserializeFromJson($visitor, ['test1', 'test2'], $context);
        $this->assertEquals(['test1', 'test2'], $string->getValues());
    }
}
