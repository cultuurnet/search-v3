<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class Audience
{
    /**
     * @var string|null
     * @Type("string")
     */
    private $audienceType;

    public function __construct(
        ?string $audienceType = null
    ) {
        $this->audienceType = $audienceType;
    }

    public function getAudienceType(): ?string
    {
        return $this->audienceType;
    }

    public function setAudienceType(string $audienceType): void
    {
        $this->audienceType = $audienceType;
    }
}
