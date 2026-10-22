<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

final class ChildcareTest extends TestCase
{
    public function testConstructor(): void
    {
        $childcare = new Childcare('11:00', '15:00');

        $this->assertEquals('11:00', $childcare->getStart());
        $this->assertEquals('15:00', $childcare->getEnd());
    }

    public function testEmptyConstructor(): void
    {
        $childcare = new Childcare();

        $this->assertNull($childcare->getStart());
        $this->assertNull($childcare->getEnd());
    }

    public function testGettersAndSetters(): void
    {
        $childcare = new Childcare();
        $childcare->setStart('11:00');
        $childcare->setEnd('15:00');

        $this->assertEquals('11:00', $childcare->getStart());
        $this->assertEquals('15:00', $childcare->getEnd());
    }

    public function testDeserializeChildcare(): void
    {
        $jsonString = json_encode([
            'start' => '11:00',
            'end' => '15:00',
        ]);

        $serializer = new Serializer();
        /** @var Childcare $childcare */
        $childcare = $serializer->deserialize($jsonString, Childcare::class);

        $this->assertEquals('11:00', $childcare->getStart());
        $this->assertEquals('15:00', $childcare->getEnd());
    }

    public function testDeserializeChildcareWithOnlyEnd(): void
    {
        $jsonString = json_encode([
            'end' => '15:00',
        ]);

        $serializer = new Serializer();
        /** @var Childcare $childcare */
        $childcare = $serializer->deserialize($jsonString, Childcare::class);

        $this->assertNull($childcare->getStart());
        $this->assertEquals('15:00', $childcare->getEnd());
    }
}
