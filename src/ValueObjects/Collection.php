<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class Collection
{
    private $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function addItem($object): void
    {
        $this->items[] = $object;
    }
}
