<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class EmbedUitpasPrices extends TestCase
{
    public function testConstructor(): void
    {
        $embedUitpasPrices = new EmbedUitpasPrices();

        $key = $embedUitpasPrices->getKey();
        $value = $embedUitpasPrices->getValue();

        $this->assertEquals('embedUitpasPrices', $key);
        $this->assertEquals(true, $value);
    }
}
