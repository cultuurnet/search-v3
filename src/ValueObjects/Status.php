<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class Status
{
    /**
     * @var string|null
     * @Type("string")
     */
    private $type;

    /**
     * @var TranslatedString|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedString")
     */
    private $reason;

    public function __construct(
        ?string $type = null,
        ?TranslatedString $reason = null
    ) {
        $this->type = $type;
        $this->reason = $reason;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getReason(): ?TranslatedString
    {
        return $this->reason;
    }

    public function setReason(?TranslatedString $reason): void
    {
        $this->reason = $reason;
    }
}
