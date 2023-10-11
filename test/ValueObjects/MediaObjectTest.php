<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class MediaObjectTest extends TestCase
{
    /**
     * @var MediaObject
     */
    protected $mediaObject;

    public function setUp(): void
    {
        $this->mediaObject = new MediaObject();
    }

    public function testGetIdMethod(): void
    {
        $this->mediaObject->setId('mediaObject-id');

        $result = $this->mediaObject->getId();
        $this->assertEquals('mediaObject-id', $result);
    }

    public function testGetContentUrlMethod(): void
    {
        $this->mediaObject->setContentUrl('http://content-url.com');

        $result = $this->mediaObject->getContentUrl();
        $this->assertEquals('http://content-url.com', $result);
    }

    public function testGetThumbnailUrlMethod(): void
    {
        $this->mediaObject->setThumbnailUrl('http://thumbnail-url.com');

        $result = $this->mediaObject->getThumbnailUrl();
        $this->assertEquals('http://thumbnail-url.com', $result);
    }

    public function testGetDescriptionMethod(): void
    {
        $this->mediaObject->setDescription('this is a description');

        $result = $this->mediaObject->getDescription();
        $this->assertEquals('this is a description', $result);
    }

    public function testGetCopyrightHolderMethod(): void
    {
        $this->mediaObject->setCopyrightHolder('copyright holder');

        $result = $this->mediaObject->getCopyrightHolder();
        $this->assertEquals('copyright holder', $result);
    }
}
