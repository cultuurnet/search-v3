<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class TermLabelsTest extends TestCase
{
    public function testConstructor(): void
    {
        $termLabel = new TermLabels('Jeugdhuis of jeugdcentrum');

        $key = $termLabel->getKey();
        $value = $termLabel->getValue();

        $this->assertEquals('termLabels', $key);
        $this->assertEquals('Jeugdhuis of jeugdcentrum', $value);
    }
}
