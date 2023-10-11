<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use CultuurNet\SearchV3\ValueObjects\FacetResult;
use CultuurNet\SearchV3\ValueObjects\FacetResultItem;
use CultuurNet\SearchV3\ValueObjects\FacetResults;
use CultuurNet\SearchV3\ValueObjects\TranslatedString;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

final class FacetResultsHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => FacetResults::class,
                'method' => 'deserializeFacetResultsFromJson',
            ],
        ];
    }

    public function deserializeFacetResultsFromJson(JsonDeserializationVisitor $visitor, array $values, array $type, Context $context): ?FacetResults
    {
        $facetResults = new FacetResults();

        foreach ($values as $facetType => $results) {
            $facetResults->addFacetResult($facetType, new FacetResult($facetType, $this->deserializeResults($results)));
        }

        return $facetResults;
    }

    private function deserializeResults($results): array
    {
        $items = [];
        foreach ($results as $value => $result) {
            $children = isset($result['children']) ? $this->deserializeResults($result['children']) : [];
            $items[] = new FacetResultItem($value, new TranslatedString($result['name']), $result['count'], $children);
        }
        return $items;
    }
}
