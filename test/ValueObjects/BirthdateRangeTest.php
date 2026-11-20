<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

final class BirthdateRangeTest extends TestCase
{
    public function testConstructor(): void
    {
        $birthdateRange = new BirthdateRange('2021-09-18', '2022-09-17');

        $this->assertEquals('2021-09-18', $birthdateRange->getFrom());
        $this->assertEquals('2022-09-17', $birthdateRange->getTo());
    }

    public function testEmptyConstructor(): void
    {
        $birthdateRange = new BirthdateRange();

        $this->assertNull($birthdateRange->getFrom());
        $this->assertNull($birthdateRange->getTo());
    }

    public function testGettersAndSetters(): void
    {
        $birthdateRange = new BirthdateRange();
        $birthdateRange->setFrom('2021-09-18');
        $birthdateRange->setTo('2022-09-17');

        $this->assertEquals('2021-09-18', $birthdateRange->getFrom());
        $this->assertEquals('2022-09-17', $birthdateRange->getTo());
    }

    public function testDeserializeBirthdateRange(): void
    {
        $jsonString = json_encode([
            'from' => '2021-09-18',
            'to' => '2022-09-17',
        ]);

        $serializer = new Serializer();
        /** @var BirthdateRange $birthdateRange */
        $birthdateRange = $serializer->deserialize($jsonString, BirthdateRange::class);

        $this->assertEquals('2021-09-18', $birthdateRange->getFrom());
        $this->assertEquals('2022-09-17', $birthdateRange->getTo());
    }
}
