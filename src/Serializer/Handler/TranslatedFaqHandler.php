<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use CultuurNet\SearchV3\ValueObjects\FaqItem;
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
                'method' => 'deserializeFromJson',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => TranslatedFaq::class,
                'method' => 'serializeFromObject',
            ],
        ];
    }

    public function deserializeFromJson(JsonDeserializationVisitor $visitor, $values, array $type, Context $context): TranslatedFaq
    {
        $translatedFaq = new TranslatedFaq();

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $item = new FaqItem(
                    $value['question'] ?? null,
                    $value['answer'] ?? null
                );
                $translatedFaq->addItem($key, $item);
            }
        }

        return $translatedFaq;
    }

    public function serializeFromObject(JsonSerializationVisitor $visitor, TranslatedFaq $value, array $type = null, Context $context): array
    {
        $result = [];
        foreach ($value->getItems() as $langcode => $item) {
            $result[$langcode] = [
                'question' => $item->getQuestion(),
                'answer' => $item->getAnswer(),
            ];
        }
        return $result;
    }
}
