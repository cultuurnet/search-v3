<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class LabelsTest extends TestCase
{
    public function testConstructor(): void
    {
        $label = new Label('this-is-a-label');

        $key = $label->getKey();
        $value = $label->getValue();

        $this->assertEquals('labels', $key);
        $this->assertEquals('this-is-a-label', $value);
    }
}
