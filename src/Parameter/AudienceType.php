<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class AudienceType extends AbstractParameter
{
    public const AUDIENCE_EVERYONE = 'everyone';
    public const AUDIENCE_MEMBERS = 'members';
    public const AUDIENCE_EDUCATION = 'education';

    public function __construct(string $audienceType)
    {
        $this->value = $audienceType;
        $this->key = 'audienceType';
    }
}
