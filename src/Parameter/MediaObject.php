<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class MediaObject extends AbstractParameter
{
    public function __construct(bool $hasMediaObjects)
    {
        $this->value = $hasMediaObjects;
        $this->key = 'hasMediaObjects';
    }
}
