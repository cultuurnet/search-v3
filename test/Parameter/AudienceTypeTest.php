<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class AudienceTypeTest extends TestCase
{
    public function testConstructor(): void
    {
        $audienceType = new AudienceType(AudienceType::AUDIENCE_EVERYONE);

        $key = $audienceType->getKey();
        $value = $audienceType->getValue();

        $this->assertEquals('audienceType', $key);
        $this->assertEquals('everyone', $value);
    }
}
