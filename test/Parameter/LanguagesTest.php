<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class LanguagesTest extends TestCase
{
    public function testConstructor(): void
    {
        $language = new Languages(Languages::LANG_NL);

        $key = $language->getKey();
        $value = $language->getValue();

        $this->assertEquals('languages', $key);
        $this->assertEquals('nl', $value);
    }

    public function testConstructorWithWrongLanguage()
    {
        $this->expectException(\Exception::class);
        new Languages('not a valid language');
    }
}
