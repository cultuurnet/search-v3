<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class UitpasTest extends TestCase
{
    public function testConstructor(): void
    {
        $uitpas = new Uitpas(true);

        $key = $uitpas->getKey();
        $value = $uitpas->getValue();

        $this->assertEquals('uitpas', $key);
        $this->assertEquals(true, $value);
    }
}
