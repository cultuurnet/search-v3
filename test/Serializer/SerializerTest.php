<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer;

use CultuurNet\SearchV3\ValueObjects\Address;
use CultuurNet\SearchV3\ValueObjects\Audience;
use CultuurNet\SearchV3\ValueObjects\CalendarSummary;
use CultuurNet\SearchV3\ValueObjects\Collection;
use CultuurNet\SearchV3\ValueObjects\ContactPoint;
use CultuurNet\SearchV3\ValueObjects\Event;
use CultuurNet\SearchV3\ValueObjects\FacetResult;
use CultuurNet\SearchV3\ValueObjects\FacetResultItem;
use CultuurNet\SearchV3\ValueObjects\FacetResults;
use CultuurNet\SearchV3\ValueObjects\GeoPoint;
use CultuurNet\SearchV3\ValueObjects\MediaObject;
use CultuurNet\SearchV3\ValueObjects\Organizer;
use CultuurNet\SearchV3\ValueObjects\PagedCollection;
use CultuurNet\SearchV3\ValueObjects\Place;
use CultuurNet\SearchV3\ValueObjects\PriceInfo;
use CultuurNet\SearchV3\ValueObjects\Status;
use CultuurNet\SearchV3\ValueObjects\Term;
use CultuurNet\SearchV3\ValueObjects\TranslatedAddress;
use CultuurNet\SearchV3\ValueObjects\TranslatedString;
use CultuurNet\SearchV3\ValueObjects\Video;
use PHPUnit\Framework\TestCase;

final class SerializerTest extends TestCase
{
    /**
     * @var Serializer
     */
    protected $serializer;

    public function setUp(): void
    {
        $this->serializer = new Serializer();
    }

    public function testSerializeMethod(): void
    {
        $addressMock = new Address();
        $addressMock->setAddressLocality('Brussel');
        $addressMock->setPostalCode('1000');
        $addressMock->setStreetAddress('Henegouwenkaai 41-43');
        $addressMock->setAddressCountry('BE');

        $expectedAddress = '{"addressCountry":"BE","addressLocality":"Brussel",';
        $expectedAddress .= '"postalCode":"1000","streetAddress":"Henegouwenkaai 41-43"}';

        $result = $this->serializer->serialize($addressMock);
        $this->assertEquals($expectedAddress, $result);
    }

    public function testDeserializeMethodForResultsWithoutEmbed(): void
    {
        $jsonString = file_get_contents(__DIR__ . '/data/search-without-embed.json');

        $expectedMember = new Collection();
        $expectedMember->setItems(
            [
                $this->createEventWithId('https://io.uitdatabank.be/event/cec57058-0acd-4ff8-a9a7-f3097e8d74e3'),
                $this->createEventWithId('https://io.uitdatabank.be/event/efc98e66-f6e0-45ec-93c0-a690928ee356'),
                $this->createEventWithId('https://io.uitdatabank.be/event/ec8e6497-bbb6-481d-aee9-57ccdcf87b7e'),
                $this->createEventWithId('https://io.uitdatabank.be/event/a9588da5-2543-48fe-9528-f4d2ec43c411'),
                $this->createEventWithId('https://io.uitdatabank.be/event/33a90c9c-ecd3-483d-b655-120771be5774'),
            ]
        );

        $expected = new PagedCollection();
        $expected->setItemsPerPage(5);
        $expected->setTotalItems(32449);
        $expected->setMember($expectedMember);

        $actual = $this->serializer->deserialize($jsonString);

        $this->assertEquals($expected, $actual);
    }

    public function testDeserializeMethodForResultWithObsoleteCalendarSummaryFormat(): void
    {
        $jsonString = file_get_contents(__DIR__ . '/data/search-with-obsolete-calendar-summary-format.json');

        /** @var PagedCollection $actual */
        $actual = $this->serializer->deserialize($jsonString);

        /** @var Event $actualEvent */
        $actualEvent = $actual->getMember()->getItems()[0];

        $this->assertNull($actualEvent->getCalendarSummary());
    }

    public function testDeserializeMethodForResultsWithEmbedAndFacets(): void
    {
        $jsonString = file_get_contents(__DIR__ . '/data/search-with-embed-and-facets.json');

        $event = $this->createEventWithId('https://io.uitdatabank.be/event/7438ac58-fb2b-4ddc-bbda-d2d3d61681c5');
        $event->setMainLanguage('fr');
        $event->setName(new TranslatedString([
            'fr' => 'Le sanglier et le papillon - La mue',
            'nl' => 'Het zwijn en de vlinder - De rui',
        ]));
        $event->setCalendarType('multiple');
        $event->setStartDate(new \DateTime('2021-01-21T23:00:00+00:00'));
        $event->setEndDate(new \DateTime('2021-03-04T22:59:59+00:00'));
        $event->setCalendarSummary(new CalendarSummary([
            'nl' => [
                'text' => [
                    'xs' => 'nl-text-xs',
                    'md' => 'nl-text-md',
                ],
                'html' => [
                    'sm' => 'nl-html-sm',
                ],
            ],
            'fr' => [
                'text' => [
                    'lg' => 'fr-text-lg',
                ],
                'html' => [
                    'sm' => 'fr-html-sm',
                ],
            ],
            'de' => [
                'text' => [
                    'md' => 'de-text-md',
                ],
            ],
            'en' => [
                'text' => [
                    'md' => 'en-text-md',
                ],
            ],
        ]));

        $event->setAvailableFrom(new \DateTime('2021-01-13T12:00:38+01:00'));
        $event->setAvailableTo(new \DateTime('2021-03-04T22:59:59+00:00'));

        $event->setStatus(
            new Status(
                'Available',
                new TranslatedString(
                    [
                        'nl' => 'Nederlandse reden',
                        'en' => 'English reason',
                    ]
                )
            )
        );

        $event->setAttendanceMode('mixed');
        $event->setOnlineUrl('https://www.livestream.be/');

        $subEvent1 = new Event();
        $subEvent1->setStatus(new Status('Available'));
        $subEvent1->setStartDate(new \DateTime('2021-01-21T23:00:00+00:00'));
        $subEvent1->setEndDate(new \DateTime('2021-01-22T22:59:59+00:00'));

        $subEvent2 = new Event();
        $subEvent2->setStatus(
            new Status(
                'Unavailable',
                new TranslatedString(
                    [
                        'nl' => 'Nederlandse reden',
                        'en' => 'English reason',
                    ]
                )
            )
        );
        $subEvent2->setStartDate(new \DateTime('2021-03-03T23:00:00+00:00'));
        $subEvent2->setEndDate(new \DateTime('2021-03-04T22:59:59+00:00'));

        $event->setSubEvents([$subEvent1, $subEvent2]);

        $term = new Term();
        $term->setId('0.0.0.0.0');
        $term->setLabel('Tentoonstelling');
        $term->setDomain('eventtype');
        $event->setTerms([$term]);

        $event->setCreated(new \DateTime('2021-01-13T10:56:12+00:00'));
        $event->setModified(new \DateTime('2021-01-13T11:07:19+00:00'));
        $event->setCreator('618d65f9-641c-4697-8fd8-436dabaebd2e');
        $event->setWorkflowStatus('READY_FOR_VALIDATION');

        $audience = new Audience();
        $audience->setAudienceType('everyone');
        $event->setAudience($audience);

        $event->setTypicalAgeRange('18-95');

        // @codingStandardsIgnoreStart
        $event->setDescription(new TranslatedString([
            'fr' => "A travers la fabrication d’un atlas de terminologies installé dans la vitrine de Constant, Jen Debauche, accompagnée d’ Elsa Rossler, propose une ontologie personnelle de la folie, de la psychiatrie et des soins.\n\n« Je travaillais pour la Commission européenne, je pilotais un séminaire au Portugal, je dormais 3 heures par jour. Un matin, au lieu d’aller à mon bureau, j’ai acheté une hâche et l’ai apportée devant la directrice du département qui m’avait embauché... » Bruno raconte calmement cet épisode de sa vie, il en est sorti. Personne n’est à l’abri d’une traversée du miroir en territoire de folie. Les témoignages poignants et fascinants de cette création visuelle et sonore nous plongent dans une matière fictionnelle intense. La maladie n’est pas que souffrance, elle est aussi matière à réfléchir, à questionner, à inventer.\n\nVous êtes les bienvenu.e.s pour une séance d’écoute collective (Corona proof) des deux documentaires radio : Le sanglier et le papillon et La mue le 30 janvier 2021 de 19:00 à 21:30 au PIanofabriek, rue du Fort 35, 1060 Saint-Gilles.\n\nLe nombre de places disponible est limité. Réservez par e-mail en écrivant à : donatella@constantvzw.org",
            'nl' => "In de vitrine van Constant toont Jen Debauche, vergezeld door Elsa Rossler, een atlas van terminologieën die een persoonlijke ontologie voorstelt waanzin, zorg en psychiatrie.\n\n\"Ik werkte voor de Europese Commissie, ik leidde een seminar in Portugal, ik sliep 3 uur per dag. Op een ochtend, in plaats van naar mijn kantoor te gaan, kocht ik een bijl en bracht deze mee voor de directrice van de afdeling die me inhuurde...\" Bruno vertelt rustig over deze episode van zijn leven, hij kwam er uit. Niemand is veilig voor een stap door de spiegel naar het land van de gekte. De aangrijpende en fascinerende getuigenissen van deze klankcreatie dompelen ons onder in een intens fictief materiaal. Ziekte is niet alleen lijden, het is ook materie die leidt tot bevraging, uitvinden en reflectie.\n\nJe bent van harte welkom voor een (Corona-proof) collectieve luistersessie van de twee radiodocumentaires: Le sanglier et le papillon en La mue op 30 januari 2021 van 19u tot 21u30 in De PIanofabriek, Fortstraat 35, 1060 Sint-Gillis. Deze sessie is in het Frans.\n\nDe plaatsen zijn beperkt.  Reserveringen per email aan: donatella@constantvzw.org",
        ]));
        // @codingStandardsIgnoreEnd

        $mediaObject = new MediaObject();
        $mediaObject->setId('https://io.uitdatabank.be/images/e65ef366-65a0-4172-a0fe-6844655ad6b9');
        $mediaObject->setContentUrl('https://io.uitdatabank.be/images/e65ef366-65a0-4172-a0fe-6844655ad6b9.jpeg');
        $mediaObject->setThumbnailUrl('https://io.uitdatabank.be/images/e65ef366-65a0-4172-a0fe-6844655ad6b9.jpeg');
        $mediaObject->setDescription('Camouflage');
        $mediaObject->setCopyrightHolder('Lucile Desamory, 2010');
        $event->setMediaObjects([$mediaObject]);
        $event->setImage('https://io.uitdatabank.be/images/e65ef366-65a0-4172-a0fe-6844655ad6b9.jpeg');

        $video1 = new Video();
        $video1->setId('6d787098-3082-4a0f-a510-1df4597ae02f');
        $video1->setUrl('https://www.youtube.com/watch?v=cEItmb_a20D');
        $video1->setEmbedUrl('https://www.youtube.com/embed/cEItmb_a20D');
        $video1->setLanguage('nl');
        $video1->setCopyrightHolder('Copyright afgehandeld door YouTube');
        $video2 = new Video();
        $video2->setId('192a07d9-049b-4c2a-bc94-e46b7a557529');
        $video2->setUrl('https://www.youtube.com/watch?v=sXYtmb_q19C');
        $video2->setEmbedUrl('https://www.youtube.com/embed/sXYtmb_q19C');
        $video2->setLanguage('fr');
        $video2->setCopyrightHolder('publiq');
        $event->setVideos([$video1, $video2]);

        $priceInfo = new PriceInfo();
        $priceInfo->setCategory('base');
        $priceInfo->setName(new TranslatedString([
            'nl' => 'Basistarief',
            'fr' => 'Tarif de base',
            'en' => 'Base tariff',
            'de' => 'Basisrate',
        ]));
        $priceInfo->setPrice(0);
        $priceInfo->setPriceCurrency('EUR');
        $event->setPriceInfo([$priceInfo]);

        $contactPoint = new ContactPoint();
        $contactPoint->setPhoneNumbers(['025392467']);
        $contactPoint->setEmails(['info@constantvzw.org']);
        $contactPoint->setUrls(['http://www.constantvzw.org']);
        $event->setContactPoint($contactPoint);

        $location = new Place();
        $location->setId('https://io.uitdatabank.be/place/295d19f2-eb53-4d3d-a4a8-11aaaf058094');
        $location->setMainLanguage('nl');
        $location->setName(new TranslatedString([
            'nl' => 'Constant vzw',
            'fr' => 'Constant asbl',
            'en' => 'Constant',
        ]));

        $location->setStatus(new Status('Available'));

        $addressNl = new Address();
        $addressNl->setAddressCountry('BE');
        $addressNl->setAddressLocality('Sint-Gillis');
        $addressNl->setPostalCode('1060');
        $addressNl->setStreetAddress('Fortstraat 5');

        $addressFr = new Address();
        $addressFr->setAddressCountry('BE');
        $addressFr->setAddressLocality('Saint-Gilles');
        $addressFr->setPostalCode('1060');
        $addressFr->setStreetAddress('Rue du Fort 5');

        $addresses = new TranslatedAddress();
        $addresses->setAddresses([
            'nl' => $addressNl,
            'fr' => $addressFr,
        ]);
        $location->setAddress($addresses);

        $location->setCalendarType('permanent');
        $location->setAvailableFrom(new \DateTime('2013-10-19T01:19:59+02:00'));
        $location->setAvailableTo(new \DateTime('2100-01-01T00:00:00+00:00'));

        $locationTerm = new Term();
        $locationTerm->setId('0.8.0.0.0');
        $locationTerm->setLabel('Openbare ruimte');
        $locationTerm->setDomain('eventtype');
        $location->setTerms([$locationTerm]);

        $location->setCreated(new \DateTime('2019-09-05T08:49:01+00:00'));
        $location->setModified(new \DateTime('2019-09-05T08:50:49+00:00'));
        $location->setCreator('fce2528e-473f-4c4a-9d71-bb02249872a1');
        $location->setWorkflowStatus('APPROVED');

        $geoPoint = new GeoPoint();
        $geoPoint->setLatitude(50.8299134);
        $geoPoint->setLongitude(4.3434589);
        $location->setGeo($geoPoint);

        $event->setLocation($location);

        $organizer = new Organizer();
        $organizer->setId('https://io.uitdatabank.be/organizers/50c2e3f1-1f40-47a0-a72f-265ede8048fb');
        $organizer->setName(new TranslatedString([
            'nl' => 'Constant vzw',
        ]));
        $organizer->setMainLanguage('nl');
        $organizer->setLanguages(['nl']);
        $organizer->setCompletedLanguages(['nl']);
        $organizer->setUrl('http://constantvzw.org');
        $organizer->setCreator('618d65f9-641c-4697-8fd8-436dabaebd2e');
        $organizer->setWorkflowStatus('ACTIVE');
        $organizer->setCreated(new \DateTime('2018-05-09T12:32:39+00:00'));
        $organizer->setModified(new \DateTime('2018-05-09T12:32:39+00:00'));

        $organizerContactPoint = new ContactPoint();
        $organizerContactPoint->setEmails(['info@constantvzw.org']);
        $organizer->setContactPoint($organizerContactPoint);

        $organizerAddresses = new TranslatedAddress();
        $organizerAddresses->setAddresses([
          'nl' => $addressNl,
          'fr' => $addressFr,
        ]);
        $organizer->setAddress($organizerAddresses);

        $event->setOrganizer($organizer);

        $expectedMember = new Collection();
        $expectedMember->setItems([$event]);

        $regionResultItem = new FacetResultItem(
            'nis-01000',
            new TranslatedString([
                'nl' => 'Brussels Hoofdstedelijk Gewest',
                'fr' => 'Région de Bruxelles-Capitale',
                'de' => 'Region Brüssel-Hauptstadt',
            ]),
            4
        );
        $regionResults = new FacetResult('regions', [$regionResultItem]);

        $expectedFacets = new FacetResults();
        $expectedFacets->setFacetResults(['regions' => $regionResults]);

        $expected = new PagedCollection();
        $expected->setItemsPerPage(1);
        $expected->setTotalItems(4);
        $expected->setMember($expectedMember);
        $expected->setFacets($expectedFacets);

        $actual = $this->serializer->deserialize($jsonString);

        $this->assertEquals($expected, $actual);
    }

    private function createEventWithId(string $id): Event
    {
        $event = new Event();
        $event->setId($id);
        return $event;
    }
}
