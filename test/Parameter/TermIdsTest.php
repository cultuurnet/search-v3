<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class TermIdsTest extends TestCase
{
    public function testConstructor(): void
    {
        $termId = new TermIds('JCjA0i5COUmdjMwcyjNAFA');

        $key = $termId->getKey();
        $value = $termId->getValue();

        $this->assertEquals('termIds', $key);
        $this->assertEquals('JCjA0i5COUmdjMwcyjNAFA', $value);
    }
}
