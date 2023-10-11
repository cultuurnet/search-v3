<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class Place extends Offer
{
    /**
     * @var TranslatedAddress|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedAddress")
     */
    private $address;

    /**
     * @var GeoPoint
     * @Type("CultuurNet\SearchV3\ValueObjects\GeoPoint")
     */
    private $geo;

    public function getAddress(): ?TranslatedAddress
    {
        return $this->address;
    }

    public function setAddress(TranslatedAddress $address): void
    {
        $this->address = $address;
    }

    public function getGeo(): ?GeoPoint
    {
        return $this->geo;
    }

    public function setGeo(GeoPoint $geo): void
    {
        $this->geo = $geo;
    }
}
