<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class TranslatedAddress
{
    /**
     * @var Address[]
     */
    private $addresses = [];

    /**
     * @return Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param Address[] $addresses
     */
    public function setAddresses(array $addresses): void
    {
        $this->addresses = $addresses;
    }

    public function addAddress(string $key, Address $address): void
    {
        if (!isset($this->addresses[$key])) {
            $this->addresses[$key] = $address;
        }
    }

    public function getAddressForLanguage(string $langcode): ?Address
    {
        return $this->addresses[$langcode] ?? null;
    }
}
