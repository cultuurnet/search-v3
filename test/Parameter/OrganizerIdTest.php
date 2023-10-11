<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class OrganizerIdTest extends TestCase
{
    public function testConstructor(): void
    {
        $id = new OrganizerId('7d1f485d-dab5-4ad2-8894-322060a2bc52');

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('organizerId', $key);
        $this->assertEquals('7d1f485d-dab5-4ad2-8894-322060a2bc52', $value);
    }
}
