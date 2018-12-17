<?php

namespace CultuurNet\SearchV3\Test\ValueObjects;

use CultuurNet\SearchV3\ValueObjects\ContactPoint;
use CultuurNet\SearchV3\ValueObjects\Organizer;
use CultuurNet\SearchV3\ValueObjects\TranslatedString;

class OrganizerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Organizer
     */
    protected $organizer;

    public function setUp()
    {
        $this->organizer = new Organizer();
    }

    public function testGetIdMethod()
    {
        $this->organizer->setId('organizer id');

        $result = $this->organizer->getId();
        $this->assertEquals('organizer id', $result);
    }

    public function testGetCdbidMethod()
    {
        $this->organizer->setId('this/is/an/organizer-id');

        $result = $this->organizer->getCdbid();
        $this->assertEquals('organizer-id', $result);
    }

    public function testGetAndSetNameMethods()
    {
        $name = new TranslatedString(['nl' => 'organizer name']);
        $this->organizer->setName($name);
        $this->assertEquals($name, $this->organizer->getName());
    }

    public function testGetEmailMethod()
    {
        $this->organizer->setEmail(array('test@organizer.com'));

        $result = $this->organizer->getEmail();
        $this->assertEquals(array('test@organizer.com'), $result);
    }

    public function testGetHiddenLabelsMethod()
    {
        $this->organizer->setHiddenLabels(array('hidden1', 'hidden2'));

        $result = $this->organizer->getHiddenLabels();
        $this->assertEquals(array('hidden1', 'hidden2'), $result);
    }

    public function testGetContactPointMehtod()
    {
        $expectedContactPoint = array(
            'email' => array('info@mail.com'),
            'phone' => array('0123456789'),
            'url' => array('http://test-url.com')
        );

        $contactPoint = new ContactPoint();
        $contactPoint->setEmails(['info@mail.com']);
        $contactPoint->setPhoneNumbers(['0123456789']);
        $contactPoint->setUrls(['http://test-url.com']);
        $this->organizer->setContactPoint($contactPoint);

        $result = $this->organizer->getContactPoint();
        $this->assertEquals($expectedContactPoint, $contactPoint);
    }
}
