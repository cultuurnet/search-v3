<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use DateTime;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

abstract class Offer
{
    public const CALENDAR_TYPE_MULTIPLE = 'multiple';
    public const CALENDAR_TYPE_SINGLE = 'single';
    public const CALENDAR_TYPE_PERIODIC = 'periodic';
    public const CALENDAR_TYPE_PERMANENT = 'permanent';

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("@id")
     */
    private $id;

    /**
     * @var string|null
     * @Type("string")
     */
    private $mainLanguage;

    /**
     * @var TranslatedString|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedString")
     */
    private $name;

    /**
     * @var TranslatedString|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedString")
     */
    private $description;

    /**
     * @var CalendarSummary|null
     * @Type("CultuurNet\SearchV3\ValueObjects\CalendarSummary")
     */
    private $calendarSummary;

    /**
     * @var string|null
     * @Type("string")
     */
    private $calendarType;

    /**
     * @var string|null
     * @Type("string")
     */
    private $creator;

    /**
     * @var DateTime|null
     * @Type("DateTime")
     */
    private $created;

    /**
     * @var DateTime|null
     * @Type("DateTime")
     */
    private $modified;

    /**
     * @var string|null
     * @Type("string")
     */
    private $workflowStatus;

    /**
     * @var string|null
     * @Type("string")
     */
    private $publisher;

    /**
     * @var string|null
     * @Type("string")
     */
    private $typicalAgeRange;

    /**
     * @var Audience|null
     * @Type("CultuurNet\SearchV3\ValueObjects\Audience")
     */
    private $audience;

    /**
     * @var Performer[]
     * @Type("array<CultuurNet\SearchV3\ValueObjects\Performer>")
     * @SerializedName("performer")
     */
    private $performers = [];

    /**
     * @var string|null
     * @Type("string")
     */
    private $image;

    /**
     * @var MediaObject[]
     * @Type("array<CultuurNet\SearchV3\ValueObjects\MediaObject>")
     * @SerializedName("mediaObject")
     */
    private $mediaObjects = [];

    /**
     * @var Video[]
     * @Type("array<CultuurNet\SearchV3\ValueObjects\Video>")
     */
    private $videos = [];

    /**
     * @var Organizer|null
     * @Type("CultuurNet\SearchV3\ValueObjects\Organizer")
     */
    private $organizer;

    /**
     * @var array
     * @Type("array<string>")
     */
    private $labels = [];

    /**
     * @var array
     * @Type("array<string>")
     */
    private $hiddenLabels = [];

    /**
     * @var DateTime|null
     * @Type("DateTime")
     */
    private $startDate;

    /**
     * @var DateTime|null
     * @Type("DateTime")
     */
    private $endDate;

    /**
     * @var Term[]
     * @Type("array<CultuurNet\SearchV3\ValueObjects\Term>")
     */
    private $terms = [];

    /**
     * @var ContactPoint|null
     * @Type("CultuurNet\SearchV3\ValueObjects\ContactPoint")
     */
    private $contactPoint;

    /**
     * @var array
     * @Type("array<CultuurNet\SearchV3\ValueObjects\OpeningHours>")
     */
    private $openingHours = [];

    /**
     * @var Status
     * @Type("CultuurNet\SearchV3\ValueObjects\Status")
     */
    private $status;

    /**
     * @var DateTime|null
     * @Type("DateTime")
     */
    private $availableFrom = null;

    /**
     * @var DateTime|null
     * @Type("DateTime")
     */
    private $availableTo = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCdbid(): ?string
    {
        if (is_null($this->id)) {
            return null;
        }

        $id_parts = explode('/', rtrim($this->id, '/'));
        return end($id_parts);
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getMainLanguage(): ?string
    {
        return $this->mainLanguage;
    }

    public function setMainLanguage(string $mainLanguage): void
    {
        $this->mainLanguage = $mainLanguage;
    }

    public function getName(): ?TranslatedString
    {
        return $this->name;
    }

    public function setName(TranslatedString $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?TranslatedString
    {
        return $this->description;
    }

    public function setDescription(TranslatedString $description): void
    {
        $this->description = $description;
    }

    public function getCalendarType(): ?string
    {
        return $this->calendarType;
    }

    public function setCalendarType(string $calendarType): void
    {
        $this->calendarType = $calendarType;
    }

    public function getCalendarSummary(): ?CalendarSummary
    {
        return $this->calendarSummary;
    }

    public function setCalendarSummary(CalendarSummary $calendarSummary): void
    {
        $this->calendarSummary = $calendarSummary;
    }

    public function getCreator(): ?string
    {
        return $this->creator;
    }

    public function setCreator(string $creator): void
    {
        $this->creator = $creator;
    }

    public function getCreated(): ?DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    public function getModified(): ?DateTime
    {
        return $this->modified;
    }

    public function setModified(DateTime $modified): void
    {
        $this->modified = $modified;
    }

    public function getWorkflowStatus(): ?string
    {
        return $this->workflowStatus;
    }

    public function setWorkflowStatus(string $workflowStatus): void
    {
        $this->workflowStatus = $workflowStatus;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function getAudience(): ?Audience
    {
        return $this->audience;
    }

    public function setAudience(Audience $audience): void
    {
        $this->audience = $audience;
    }

    public function getTypicalAgeRange(): ?string
    {
        return $this->typicalAgeRange;
    }

    public function setTypicalAgeRange(string $typicalAgeRange): void
    {
        $this->typicalAgeRange = $typicalAgeRange;
    }

    /**
     * @return Performer[]
     */
    public function getPerformers(): array
    {
        return $this->performers;
    }

    /**
     * @param Performer[] $performers
     */
    public function setPerformers(array $performers): void
    {
        $this->performers = $performers;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return MediaObject[]
     */
    public function getMediaObjects(): array
    {
        return $this->mediaObjects;
    }

    /**
     * @param MediaObject[] $mediaObjects
     */
    public function setMediaObjects(array $mediaObjects): void
    {
        $this->mediaObjects = $mediaObjects;
    }

    /**
     * @return Video[]
     */
    public function getVideos(): array
    {
        return $this->videos;
    }

    /**
     * @param Video[] $videos
     */
    public function setVideos(array $videos): void
    {
        $this->videos = $videos;
    }

    public function getMainMediaObject(): ?MediaObject
    {
        $mediaObjects = $this->getMediaObjects();
        foreach ($mediaObjects as $mediaObject) {
            if ($mediaObject->getContentUrl() === $this->getImage()) {
                return $mediaObject;
            }
        }
        return null;
    }

    public function getOrganizer(): ?Organizer
    {
        return $this->organizer;
    }

    public function setOrganizer(Organizer $organizer): void
    {
        $this->organizer = $organizer;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }

    public function setLabels(array $labels): void
    {
        $this->labels = $labels;
    }

    public function getHiddenLabels(): array
    {
        return $this->hiddenLabels;
    }

    public function setHiddenLabels(array $hiddenLabels): void
    {
        $this->hiddenLabels = $hiddenLabels;
    }

    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): ?DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return Term[]
     */
    public function getTerms(): array
    {
        return $this->terms;
    }

    /**
     * Return terms, filtered on domain.
     *
     * @return Term[]
     */
    public function getTermsByDomain(string $domain): array
    {
        $filteredTerms = [];
        foreach ($this->terms as $term) {
            if ($term->getDomain() === $domain) {
                $filteredTerms[] = $term;
            }
        }
        return $filteredTerms;
    }

    /**
     * @param Term[] $terms
     */
    public function setTerms(array $terms): void
    {
        $this->terms = $terms;
    }

    public function getContactPoint(): ?ContactPoint
    {
        return $this->contactPoint;
    }

    public function setContactPoint(ContactPoint $contactPoint): void
    {
        $this->contactPoint = $contactPoint;
    }

    /**
     * @return OpeningHours[]
     */
    public function getOpeningHours(): array
    {
        return $this->openingHours;
    }

    /**
     * @param OpeningHours[] $openingHours
     */
    public function setOpeningHours(array $openingHours): void
    {
        $this->openingHours = $openingHours;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function getAvailableFrom(): ?DateTime
    {
        return $this->availableFrom;
    }

    public function setAvailableFrom(?DateTime $availableFrom): void
    {
        $this->availableFrom = $availableFrom;
    }

    public function getAvailableTo(): ?DateTime
    {
        return $this->availableTo;
    }

    public function setAvailableTo(?DateTime $availableTo): void
    {
        $this->availableTo = $availableTo;
    }
}
