<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class PlaceTest extends TestCase
{
    /**
     * @var Place
     */
    protected $place;

    public function setUp(): void
    {
        $this->place = new Place();
    }

    public function testGetAddressMethod(): void
    {
        $mockAddress = new TranslatedAddress();
        $this->place->setAddress($mockAddress);

        $result = $this->place->getAddress();
        $this->assertInstanceOf(TranslatedAddress::class, $result);
    }

    public function testGetGeoMethod(): void
    {
        $mockGeo = new GeoPoint();
        $this->place->setGeo($mockGeo);

        $result = $this->place->getGeo();
        $this->assertInstanceOf(GeoPoint::class, $result);
    }

    /**
     * Test the abstract class methods
     */

    public function testGetIdMethod(): void
    {
        $this->place->setId('place-id');

        $result = $this->place->getId();
        $this->assertEquals('place-id', $result);
    }

    public function testGetCdbidMethod(): void
    {
        $this->place->setId('this/is/a/cdbid');

        $result = $this->place->getCdbid();
        $this->assertEquals('cdbid', $result);
    }

    public function testGetMainLanguageMethod(): void
    {
        $this->place->setMainLanguage('nl');

        $result = $this->place->getMainLanguage();
        $this->assertEquals('nl', $result);
    }

    public function testGetNameMethod(): void
    {
        $name = new TranslatedString(['nl' => 'name']);
        $this->place->setName($name);
        $this->assertEquals($name, $this->place->getName());
    }

    public function testGetDescriptionMethod(): void
    {
        $description = new TranslatedString(['nl' => 'description']);

        $this->place->setDescription($description);
        $this->assertEquals($description, $this->place->getDescription());
    }

    public function testGetCalendarTypeMethod(): void
    {
        $this->place->setCalendarType('multiple');

        $result = $this->place->getCalendarType();
        $this->assertEquals('multiple', $result);
    }

    public function testGetCalendarSummaryMethod(): void
    {
        $this->place->setCalendarSummary(new CalendarSummary([]));

        $result = $this->place->getCalendarSummary();
        $this->assertEquals(new CalendarSummary([]), $result);
    }

    public function testGetCreatorMethod(): void
    {
        $this->place->setCreator('that\'s me!');

        $result = $this->place->getCreator();
        $this->assertEquals('that\'s me!', $result);
    }

    public function testGetCreatedMethod(): void
    {
        $this->place->setCreated(new \DateTime('21-11-2017'));

        $result = $this->place->getCreated();
        $this->assertEquals(new \DateTime('21-11-2017'), $result);
    }

    public function testGetModifiedMethod(): void
    {
        $this->place->setModified(new \DateTime('25-11-2017'));

        $result = $this->place->getModified();
        $this->assertEquals(new \DateTime('25-11-2017'), $result);
    }

    public function testGetPublisherMethod(): void
    {
        $this->place->setPublisher('publisher name');

        $result = $this->place->getPublisher();
        $this->assertEquals('publisher name', $result);
    }

    public function testGetTypicalAgeRangeMethod(): void
    {
        $this->place->setTypicalAgeRange('9 - 11 jaar');

        $result = $this->place->getTypicalAgeRange();
        $this->assertEquals('9 - 11 jaar', $result);
    }

    public function testGetPerformersMethod(): void
    {
        $this->place->setPerformers([new Performer('performer name')]);

        $result = $this->place->getPerformers();
        $this->assertEquals([new Performer('performer name')], $result);
    }

    public function testGetImageMethod(): void
    {
        $this->place->setImage('http://path-to-image.com');

        $result = $this->place->getImage();
        $this->assertEquals('http://path-to-image.com', $result);
    }

    public function testGetMediaObjectsMethod(): void
    {
        $mockMediaObject = new MediaObject();
        $this->place->setMediaObjects([$mockMediaObject]);

        $result = $this->place->getMediaObjects();
        $this->assertEquals([$mockMediaObject], $result);
    }

    public function testGetMainMediaObjectMethod(): void
    {
        $this->place->setImage('http://path-to-image.com');

        $mockMediaObject = new MediaObject();
        $mockMediaObject->setContentUrl('http://path-to-image.com');
        $this->place->setMediaObjects([$mockMediaObject]);

        $result = $this->place->getMainMediaObject();
        $this->assertEquals($mockMediaObject, $result);
    }

    public function testGetOrganizerMethod(): void
    {
        $mockOrganizer = new Organizer();
        $this->place->setOrganizer($mockOrganizer);

        $result = $this->place->getOrganizer();
        $this->assertEquals($mockOrganizer, $result);
    }

    public function testGetLabelsMethod(): void
    {
        $this->place->setLabels(['label1', 'label2']);

        $result = $this->place->getLabels();
        $this->assertEquals(['label1', 'label2'], $result);
    }

    public function testGetHiddenLabelsMethod(): void
    {
        $this->place->setHiddenLabels(['hidden1', 'hidden2']);

        $result = $this->place->getHiddenLabels();
        $this->assertEquals(['hidden1', 'hidden2'], $result);
    }

    public function testGetStartDateMethod(): void
    {
        $this->place->setStartDate(new \DateTime('01-01-2017'));

        $result = $this->place->getStartDate();
        $this->assertEquals(new \DateTime('01-01-2017'), $result);
    }

    public function testGetEndDateMethod(): void
    {
        $this->place->setEndDate(new \DateTime('31-12-2017'));

        $result = $this->place->getEndDate();
        $this->assertEquals(new \DateTime('31-12-2017'), $result);
    }

    public function testGetTermsMethod(): void
    {
        $mockTerm1 = new Term();
        $mockTerm1->setId('1');
        $mockTerm1->setLabel('term-label');
        $mockTerm1->setDomain('testDomain');

        $mockTerm2 = new Term();
        $mockTerm2->setId('2');
        $mockTerm2->setLabel('term-label');
        $mockTerm2->setDomain('testOtherDomain');

        $this->place->setTerms([$mockTerm1, $mockTerm2]);

        $result = $this->place->getTerms();
        $this->assertEquals([$mockTerm1, $mockTerm2], $result);
    }

    public function testGetTermsByDomainMethod(): void
    {
        $mockTerm1 = new Term();
        $mockTerm1->setId('1');
        $mockTerm1->setLabel('term-label');
        $mockTerm1->setDomain('testDomain');

        $mockTerm2 = new Term();
        $mockTerm2->setId('2');
        $mockTerm2->setLabel('term-label');
        $mockTerm2->setDomain('testOtherDomain');

        $this->place->setTerms([$mockTerm1, $mockTerm2]);

        $result = $this->place->getTermsByDomain('testDomain');
        $this->assertEquals([$mockTerm1], $result);
    }

    public function testGetContactPointMethod(): void
    {
        $mockContactPoint = new ContactPoint();
        $this->place->setContactPoint($mockContactPoint);

        $result = $this->place->getContactPoint();
        $this->assertEquals($mockContactPoint, $result);
    }

    public function testGetOpeningHoursMethod(): void
    {
        $mockOpeningHour = new OpeningHours();
        $this->place->setOpeningHours([$mockOpeningHour]);

        $result = $this->place->getOpeningHours();
        $this->assertEquals([$mockOpeningHour], $result);
    }
}
