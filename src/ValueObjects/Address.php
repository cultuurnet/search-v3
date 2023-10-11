<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class Address
{
    /**
     * @var string
     */
    private $addressCountry;

    /**
     * @var string
     */
    private $addressLocality;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $streetAddress;

    public function __construct(
        ?string $addressCountry = null,
        ?string $addressLocality = null,
        ?string $postalCode = null,
        ?string $streetAddress = null
    ) {
        $this->addressCountry = $addressCountry;
        $this->addressLocality = $addressLocality;
        $this->postalCode = $postalCode;
        $this->streetAddress = $streetAddress;
    }

    public function getAddressCountry(): ?string
    {
        return $this->addressCountry;
    }

    public function setAddressCountry(string $addressCountry): void
    {
        $this->addressCountry = $addressCountry;
    }

    public function getAddressLocality(): ?string
    {
        return $this->addressLocality;
    }

    public function setAddressLocality(string $addressLocality): void
    {
        $this->addressLocality = $addressLocality;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getStreetAddress(): ?string
    {
        return $this->streetAddress;
    }

    public function setStreetAddress(string $streetAddress): void
    {
        $this->streetAddress = $streetAddress;
    }
}
