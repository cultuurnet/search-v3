<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class TranslatedFaq
{
    /**
     * @var FaqItem[]
     */
    private $items = [];

    /**
     * @return FaqItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param FaqItem[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function addItem(string $key, FaqItem $item): void
    {
        $this->items[$key] = $item;
    }

    public function getItemForLanguage(string $langcode): ?FaqItem
    {
        return $this->items[$langcode] ?? null;
    }
}
