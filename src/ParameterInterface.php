<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3;

interface ParameterInterface
{
    /**
     * Get the key to use in the URL query.
     */
    public function getKey(): string;

    /**
     * Get the value to use in the URL query.
     */
    public function getValue();

    /**
     * Whether the parameter can be used multiple times or not.
     * Will result in an AND filter.
     */
    public function allowsMultiple(): bool;
}
