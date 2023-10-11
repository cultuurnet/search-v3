<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class FacetResultItem
{
    /**
     * The value of the facet item.
     *
     * @var string
     */
    private $value;

    /**
     * The name of this facet result.
     *
     * @var TranslatedString
     */
    private $name;

    /**
     * Total results for this item.
     *
     * @var int
     */
    private $count;

    /**
     * Child facet results
     *
     * @var array
     */
    private $children;

    public function __construct(string $value, TranslatedString $name, int $count, array $children = [])
    {
        $this->value = $value;
        $this->name = $name;
        $this->count = $count;
        $this->children = $children;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getName(): TranslatedString
    {
        return $this->name;
    }

    public function setName(TranslatedString $name): void
    {
        $this->name = $name;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function setChildren(array $children): void
    {
        $this->children = $children;
    }
}
