<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\HandlerCallback;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;

final class TranslatedString
{
    /**
     * Translations
     *
     * @var string[]
     */
    private $values;

    public function __construct(array $values = [])
    {
        $this->values = $values;
    }

    public function getValueForLanguage(string $langcode): string
    {
        return $this->values[$langcode] ?? '';
    }

    public function setValueForLanguage(string $langcode, string $value): void
    {
        $this->values[$langcode] = $value;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function setValues(array $values): void
    {
        $this->values = $values;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(
        JsonDeserializationVisitor $visitor,
        $value,
        DeserializationContext $context
    ): void {
        // Some properties are not translated yet in the api. Force them as nl.
        $this->values = is_array($value) ? $value : ['nl' => $value];
    }

    /**
     * @HandlerCallback("json", direction = "serialization")
     */
    public function serializeFromObject(JsonSerializationVisitor $visitor, array $values = NULL, SerializationContext $context): array {
      return $this->values ?? [];
    }
}
