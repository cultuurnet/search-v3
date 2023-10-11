<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class TermTest extends TestCase
{
    /**
     * @var Term
     */
    protected $term;

    public function setUp(): void
    {
        $this->term = new Term();
    }

    public function testGetIdMethod(): void
    {
        $this->term->setId('term-id');

        $result = $this->term->getId();
        $this->assertEquals('term-id', $result);
    }

    public function testGetLabelMethod(): void
    {
        $this->term->setLabel('term-label');

        $result = $this->term->getLabel();
        $this->assertEquals('term-label', $result);
    }

    public function testGetDomainMethod(): void
    {
        $this->term->setDomain('term-domain');

        $result = $this->term->getDomain();
        $this->assertEquals('term-domain', $result);
    }
}
