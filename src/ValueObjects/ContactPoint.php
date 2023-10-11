<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

final class ContactPoint
{
    /**
     * @var array
     * @Type("array<string>")
     * @SerializedName("email")
     */
    private $emails = [];

    /**
     * @var array
     * @Type("array<string>")
     * @SerializedName("phone")
     */
    private $phoneNumbers = [];

    /**
     * @var array
     * @Type("array<string>")
     * @SerializedName("url")
     */
    private $urls = [];

    public function getEmails(): array
    {
        return $this->emails;
    }

    public function setEmails(array $emails): void
    {
        $this->emails = $emails;
    }

    public function getPhoneNumbers(): array
    {
        return $this->phoneNumbers;
    }

    public function setPhoneNumbers(array $phoneNumbers): void
    {
        $this->phoneNumbers = $phoneNumbers;
    }

    public function getUrls(): array
    {
        return $this->urls;
    }

    public function setUrls(array $urls): void
    {
        $this->urls = $urls;
    }
}
