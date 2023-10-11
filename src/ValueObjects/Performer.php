<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class Performer
{
    /**
     * @var string|null
     * @Type("string")
     */
    private $name;

    /**
     * @var string|null
     * @Type("string")
     */
    private $role;

    public function __construct(
        ?string $name = null
    ) {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}
