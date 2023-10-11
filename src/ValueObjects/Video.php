<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class Video
{
    /**
     * @var string
     * @Type("string")
     */
    private $id;

    /**
     * @var string
     * @Type("string")
     */
    private $language;

    /**
     * @var string
     * @Type("string")
     */
    private $url;

    /**
     * @var string
     * @Type("string")
     */
    private $embedUrl;

    /**
     * @var string|null
     * @Type("string")
     */
    private $copyrightHolder;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getEmbedUrl(): string
    {
        return $this->embedUrl;
    }

    public function setEmbedUrl(string $embedUrl): void
    {
        $this->embedUrl = $embedUrl;
    }

    public function getCopyrightHolder(): ?string
    {
        return $this->copyrightHolder;
    }

    public function setCopyrightHolder(?string $copyrightHolder): void
    {
        $this->copyrightHolder = $copyrightHolder;
    }
}
