<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class PriceInfoTest extends TestCase
{
    /**
     * @var PriceInfo
     */
    protected $priceInfo;

    public function setUp(): void
    {
        $this->priceInfo = new PriceInfo();
    }

    public function testGetCategoryMethod(): void
    {
        $this->priceInfo->setCategory('base');

        $result = $this->priceInfo->getCategory();
        $this->assertEquals('base', $result);
    }

    public function testGetNameMethod(): void
    {
        $priceName = new TranslatedString(['nl' => 'Senioren']);
        $this->priceInfo->setName($priceName);

        $result = $this->priceInfo->getName();
        $this->assertInstanceOf('CultuurNet\SearchV3\ValueObjects\TranslatedString', $result);
        $this->assertEquals($priceName, $result);
    }

    public function testGetPriceCurrency(): void
    {
        $this->priceInfo->setPriceCurrency('euro');

        $result = $this->priceInfo->getPriceCurrency();
        $this->assertEquals('euro', $result);
    }

    public function testGetPriceMethod(): void
    {
        $this->priceInfo->setPrice(23.45);

        $result = $this->priceInfo->getPrice();
        $this->assertEquals(23.45, $result);
    }
}
