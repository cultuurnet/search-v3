<?php

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

class Place extends Offer
{

    /**
     * @var Address
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedAddress")
     */
    protected $address;

    /**
     * @Type("CultuurNet\SearchV3\ValueObjects\GeoPoint")
     */
    protected $geo;

    /**
     * @return array
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Place
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return GeoPoint
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * @param mixed $geo
     * @return Place
     */
    public function setGeo($geo)
    {
        $this->geo = $geo;
        return $this;
    }
}
