<?php

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Organizer
{

    /**
     * @var string
     * @Type("string")
     * @SerializedName("@id")
     */
    protected $id;

    /**
     * @var TranslatedString
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedString")
     */
    protected $name;

    /**
     * @var array
     * @Type("array<string>")
     */
    protected $email;

    /**
     * @var array
     * @Type("array<string>")
     */
    protected $hiddenLabels;

    /**
     * @var ContactPoint
     * @Type("CultuurNet\SearchV3\ValueObjects\ContactPoint")
     */
    protected $contactPoint;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Organizer
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the cdbid.
     * @return string
     */
    public function getCdbid()
    {
        $id_parts = explode('/', rtrim($this->id, '/'));
        return end($id_parts);
    }

    /**
     * @return TranslatedString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param TranslatedString $name
     * @return Organizer
     */
    public function setName(TranslatedString $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param array $email
     * @return Organizer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return array
     */
    public function getHiddenLabels()
    {
        return $this->hiddenLabels;
    }

    /**
     * @param array $hiddenLabels
     * @return Organizer
     */
    public function setHiddenLabels($hiddenLabels)
    {
        $this->hiddenLabels = $hiddenLabels;

        return $this;
    }

    /**
     * @return ContactPoint
     */
    public function getContactPoint()
    {
        return $this->contactPoint;
    }

    /**
     * @param ContactPoint $contactPoint
     * @return Organizer
     */
    public function setContactPoint(ContactPoint $contactPoint)
    {
        $this->contactPoint = $contactPoint;

        return $this;
    }
}
