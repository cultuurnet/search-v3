<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Serializer\Serializer;
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
        $serializer = new Serializer();

        $testString = '"value"';
        $result = $serializer->deserialize($testString, TranslatedString::class);

        $this->assertEquals(['nl' => 'value'], $result->getValues());

        $testString = '{"test1":"test2"}';
        $result = $serializer->deserialize($testString, TranslatedString::class);

        $this->assertEquals(['test1' => 'test2'], $result ->getValues());
    }
}
