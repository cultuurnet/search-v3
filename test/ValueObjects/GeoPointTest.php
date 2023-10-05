<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class GeoPointTest extends TestCase
{
    /**
     * @var GeoPoint
     */
    protected $geoPoint;

    public function setUp(): void
    {
        $this->geoPoint = new GeoPoint();
    }

    public function testGetLatitudeMethod(): void
    {
        $this->geoPoint->setLatitude(40.3445);

        $result = $this->geoPoint->getLatitude();
        $this->assertEquals(40.3445, $result);
    }

    public function testGetLongitudeMethod(): void
    {
        $this->geoPoint->setLongitude(4.321);

        $result = $this->geoPoint->getLongitude();
        $this->assertEquals(4.321, $result);
    }
}
