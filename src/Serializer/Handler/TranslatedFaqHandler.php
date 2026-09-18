<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use CultuurNet\SearchV3\ValueObjects\Faq;
use CultuurNet\SearchV3\ValueObjects\TranslatedFaq;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

final class TranslatedFaqHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => TranslatedFaq::class,
                'method' => 'deserializeFaqFromJson',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => TranslatedFaq::class,
                'method' => 'serializeFromObject',
            ],
        ];
    }

    public function deserializeFaqFromJson(JsonDeserializationVisitor $visitor, $values, array $type, Context $context): TranslatedFaq
    {
        $translatedFaq = new TranslatedFaq();

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $translatedFaq->addFaq(
                    $key,
                    new Faq(
                        $value['question'] ?? null,
                        $value['answer'] ?? null
                    )
                );
            }
        }

        return $translatedFaq;
    }

    public function serializeFromObject(JsonSerializationVisitor $visitor, TranslatedFaq $value, array $type = null, Context $context): array
    {
        return $visitor->visitArray($value->getFaqs(), []);
    }
}
