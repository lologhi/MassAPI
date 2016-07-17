<?php

namespace MassAPIBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use SchemaOrg\Enum\EventStatusType;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An event happening at a certain time and location, such as a concert, lecture, or festival. Ticketing information may be added via the 'offers' property. Repeated events may be structured as separate Event objects.
 * 
 * @see http://schema.org/Event Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/Event")
 */
class Event implements ResourceInterface
{
    /**
     * @var int
     * 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var ArrayCollection<Person> An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Person")
     * @ORM\JoinTable(name="event_actor")
     * @Iri("https://schema.org/actor")
     */
    private $actor;
    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item.
     * 
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\AggregateRating")
     * @Iri("https://schema.org/aggregateRating")
     */
    private $aggregateRating;
    /**
     * @var ArrayCollection<Person> An organizer of an Event.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Person")
     * @ORM\JoinTable(name="event_organizer")
     * @Iri("https://schema.org/organizer")
     */
    private $organizer;
    /**
     * @var ArrayCollection<Person> A person or organization attending the event.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Person")
     * @ORM\JoinTable(name="event_attendee")
     * @Iri("https://schema.org/attendee")
     */
    private $attendee;
    /**
     * @var string A description of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/description")
     */
    private $description;
    /**
     * @var ArrayCollection<Person> A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Person")
     * @ORM\JoinTable(name="event_director")
     * @Iri("https://schema.org/director")
     */
    private $director;
    /**
     * @var \DateTime The time admission will commence.
     * 
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     * @Iri("https://schema.org/doorTime")
     */
    private $doorTime;
    /**
     * @var string The duration of the item (movie, audio recording, event, etc.) in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/duration")
     */
    private $duration;
    /**
     * @var \DateTime The end date and time of the item (in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601)).
     * 
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date
     * @Iri("https://schema.org/endDate")
     */
    private $endDate;
    /**
     * @var string An eventStatus of an event represents its status; particularly useful when an event is cancelled or rescheduled.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Assert\Choice(callback={"EventStatusType", "toArray"})
     * @Iri("https://schema.org/eventStatus")
     */
    private $eventStatus;
    /**
     * @var ImageObject An image of the item. This can be a [URL](http://schema.org/URL) or a fully described [ImageObject](http://schema.org/ImageObject).
     * 
     * @ORM\ManyToOne(targetEntity="MassAPIBundle\Entity\ImageObject")
     * @Iri("https://schema.org/image")
     */
    private $image;
    /**
     * @var ArrayCollection<Language> The language of the content or performance or used in an action. Please use one of the language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47). See also [[availableLanguage]].
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Language")
     * @Iri("https://schema.org/inLanguage")
     */
    private $inLanguage;
    /**
     * @var Place The location of for example where the event is happening, an organization is located, or where an action takes place.
     * 
     * @ORM\ManyToOne(targetEntity="MassAPIBundle\Entity\Place", inversedBy="event")
     * @Iri("https://schema.org/location")
     */
    private $location;
    /**
     * @var string The name of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     */
    private $name;
    /**
     * @var ArrayCollection<Person> A performer at the event—for example, a presenter, musician, musical group or actor.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Person")
     * @ORM\JoinTable(name="event_performer")
     * @Iri("https://schema.org/performer")
     */
    private $performer;
    /**
     * @var \DateTime Used in conjunction with eventStatus for rescheduled or cancelled events. This property contains the previously scheduled start date. For rescheduled events, the startDate property should be used for the newly scheduled start date. In the (rare) case of an event that has been postponed and rescheduled multiple times, this field may be repeated.
     * 
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date
     * @Iri("https://schema.org/previousStartDate")
     */
    private $previousStartDate;
    /**
     * @var CreativeWork The CreativeWork that captured all or part of this Event.
     * 
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\CreativeWork")
     * @Iri("https://schema.org/recordedIn")
     */
    private $recordedIn;
    /**
     * @var ArrayCollection<Review> A review of the item.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Review")
     * @Iri("https://schema.org/review")
     */
    private $review;
    /**
     * @var \DateTime The start date and time of the item (in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601)).
     * 
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date
     * @Iri("https://schema.org/startDate")
     */
    private $startDate;
    /**
     * @var Event An Event that is part of this event. For example, a conference event includes many presentations, each of which is a subEvent of the conference.
     * 
     * @ORM\ManyToOne(targetEntity="MassAPIBundle\Entity\Event")
     * @Iri("https://schema.org/subEvent")
     */
    private $subEvent;
    /**
     * @var Event An event that this event is a part of. For example, a collection of individual music performances might each have a music festival as their superEvent.
     * 
     * @ORM\ManyToOne(targetEntity="MassAPIBundle\Entity\Event")
     * @Iri("https://schema.org/superEvent")
     */
    private $superEvent;
    /**
     * @var string The typical expected age range, e.g. '7-9', '11-'.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/typicalAgeRange")
     */
    private $typicalAgeRange;
    /**
     * @var string URL of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Url
     * @Iri("https://schema.org/url")
     */
    private $url;

    public function __construct()
    {
        $this->actor = new ArrayCollection();
        $this->organizer = new ArrayCollection();
        $this->attendee = new ArrayCollection();
        $this->director = new ArrayCollection();
        $this->inLanguage = new ArrayCollection();
        $this->location = new ArrayCollection();
        $this->performer = new ArrayCollection();
        $this->review = new ArrayCollection();
    }

    /**
     * Sets id.
     * 
     * @param int $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Adds actor.
     * 
     * @param Person $actor
     * 
     * @return $this
     */
    public function addActor(Person $actor)
    {
        $this->actor[] = $actor;

        return $this;
    }

    /**
     * Removes actor.
     * 
     * @param Person $actor
     * 
     * @return $this
     */
    public function removeActor(Person $actor)
    {
        $this->actor->removeElement($actor);

        return $this;
    }

    /**
     * Gets actor.
     * 
     * @return ArrayCollection<Person>
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Sets aggregateRating.
     * 
     * @param AggregateRating $aggregateRating
     * 
     * @return $this
     */
    public function setAggregateRating(AggregateRating $aggregateRating = null)
    {
        $this->aggregateRating = $aggregateRating;

        return $this;
    }

    /**
     * Gets aggregateRating.
     * 
     * @return AggregateRating
     */
    public function getAggregateRating()
    {
        return $this->aggregateRating;
    }

    /**
     * Adds organizer.
     * 
     * @param Person $organizer
     * 
     * @return $this
     */
    public function addOrganizer(Person $organizer)
    {
        $this->organizer[] = $organizer;

        return $this;
    }

    /**
     * Removes organizer.
     * 
     * @param Person $organizer
     * 
     * @return $this
     */
    public function removeOrganizer(Person $organizer)
    {
        $this->organizer->removeElement($organizer);

        return $this;
    }

    /**
     * Gets organizer.
     * 
     * @return ArrayCollection<Person>
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * Adds attendee.
     * 
     * @param Person $attendee
     * 
     * @return $this
     */
    public function addAttendee(Person $attendee)
    {
        $this->attendee[] = $attendee;

        return $this;
    }

    /**
     * Removes attendee.
     * 
     * @param Person $attendee
     * 
     * @return $this
     */
    public function removeAttendee(Person $attendee)
    {
        $this->attendee->removeElement($attendee);

        return $this;
    }

    /**
     * Gets attendee.
     * 
     * @return ArrayCollection<Person>
     */
    public function getAttendee()
    {
        return $this->attendee;
    }

    /**
     * Sets description.
     * 
     * @param string $description
     * 
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets description.
     * 
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Adds director.
     * 
     * @param Person $director
     * 
     * @return $this
     */
    public function addDirector(Person $director)
    {
        $this->director[] = $director;

        return $this;
    }

    /**
     * Removes director.
     * 
     * @param Person $director
     * 
     * @return $this
     */
    public function removeDirector(Person $director)
    {
        $this->director->removeElement($director);

        return $this;
    }

    /**
     * Gets director.
     * 
     * @return ArrayCollection<Person>
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Sets doorTime.
     * 
     * @param \DateTime $doorTime
     * 
     * @return $this
     */
    public function setDoorTime(\DateTime $doorTime = null)
    {
        $this->doorTime = $doorTime;

        return $this;
    }

    /**
     * Gets doorTime.
     * 
     * @return \DateTime
     */
    public function getDoorTime()
    {
        return $this->doorTime;
    }

    /**
     * Sets duration.
     * 
     * @param string $duration
     * 
     * @return $this
     */
    public function setDuration($duration = null)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Gets duration.
     * 
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets endDate.
     * 
     * @param \DateTime $endDate
     * 
     * @return $this
     */
    public function setEndDate(\DateTime $endDate = null)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Gets endDate.
     * 
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets eventStatus.
     * 
     * @param string $eventStatus
     * 
     * @return $this
     */
    public function setEventStatus($eventStatus)
    {
        $this->eventStatus = $eventStatus;

        return $this;
    }

    /**
     * Gets eventStatus.
     * 
     * @return string
     */
    public function getEventStatus()
    {
        return $this->eventStatus;
    }

    /**
     * Sets image.
     * 
     * @param ImageObject $image
     * 
     * @return $this
     */
    public function setImage(ImageObject $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets image.
     * 
     * @return ImageObject
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Adds inLanguage.
     * 
     * @param Language $inLanguage
     * 
     * @return $this
     */
    public function addInLanguage(Language $inLanguage)
    {
        $this->inLanguage[] = $inLanguage;

        return $this;
    }

    /**
     * Removes inLanguage.
     * 
     * @param Language $inLanguage
     * 
     * @return $this
     */
    public function removeInLanguage(Language $inLanguage)
    {
        $this->inLanguage->removeElement($inLanguage);

        return $this;
    }

    /**
     * Gets inLanguage.
     * 
     * @return ArrayCollection<Language>
     */
    public function getInLanguage()
    {
        return $this->inLanguage;
    }

    /**
     * Adds location.
     * 
     * @param Place $location
     * 
     * @return $this
     */
    public function setLocation(Place $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Gets location.
     * 
     * @return Place
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets name.
     * 
     * @param string $name
     * 
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets name.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Adds performer.
     * 
     * @param Person $performer
     * 
     * @return $this
     */
    public function addPerformer(Person $performer)
    {
        $this->performer[] = $performer;

        return $this;
    }

    /**
     * Removes performer.
     * 
     * @param Person $performer
     * 
     * @return $this
     */
    public function removePerformer(Person $performer)
    {
        $this->performer->removeElement($performer);

        return $this;
    }

    /**
     * Gets performer.
     * 
     * @return ArrayCollection<Person>
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * Sets previousStartDate.
     * 
     * @param \DateTime $previousStartDate
     * 
     * @return $this
     */
    public function setPreviousStartDate(\DateTime $previousStartDate = null)
    {
        $this->previousStartDate = $previousStartDate;

        return $this;
    }

    /**
     * Gets previousStartDate.
     * 
     * @return \DateTime
     */
    public function getPreviousStartDate()
    {
        return $this->previousStartDate;
    }

    /**
     * Sets recordedIn.
     * 
     * @param CreativeWork $recordedIn
     * 
     * @return $this
     */
    public function setRecordedIn(CreativeWork $recordedIn = null)
    {
        $this->recordedIn = $recordedIn;

        return $this;
    }

    /**
     * Gets recordedIn.
     * 
     * @return CreativeWork
     */
    public function getRecordedIn()
    {
        return $this->recordedIn;
    }

    /**
     * Adds review.
     * 
     * @param Review $review
     * 
     * @return $this
     */
    public function addReview(Review $review)
    {
        $this->review[] = $review;

        return $this;
    }

    /**
     * Removes review.
     * 
     * @param Review $review
     * 
     * @return $this
     */
    public function removeReview(Review $review)
    {
        $this->review->removeElement($review);

        return $this;
    }

    /**
     * Gets review.
     * 
     * @return ArrayCollection<Review>
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Sets startDate.
     * 
     * @param \DateTime $startDate
     * 
     * @return $this
     */
    public function setStartDate(\DateTime $startDate = null)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Gets startDate.
     * 
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets subEvent.
     * 
     * @param Event $subEvent
     * 
     * @return $this
     */
    public function setSubEvent(Event $subEvent = null)
    {
        $this->subEvent = $subEvent;

        return $this;
    }

    /**
     * Gets subEvent.
     * 
     * @return Event
     */
    public function getSubEvent()
    {
        return $this->subEvent;
    }

    /**
     * Sets superEvent.
     * 
     * @param Event $superEvent
     * 
     * @return $this
     */
    public function setSuperEvent(Event $superEvent = null)
    {
        $this->superEvent = $superEvent;

        return $this;
    }

    /**
     * Gets superEvent.
     * 
     * @return Event
     */
    public function getSuperEvent()
    {
        return $this->superEvent;
    }

    /**
     * Sets typicalAgeRange.
     * 
     * @param string $typicalAgeRange
     * 
     * @return $this
     */
    public function setTypicalAgeRange($typicalAgeRange)
    {
        $this->typicalAgeRange = $typicalAgeRange;

        return $this;
    }

    /**
     * Gets typicalAgeRange.
     * 
     * @return string
     */
    public function getTypicalAgeRange()
    {
        return $this->typicalAgeRange;
    }

    /**
     * Sets url.
     * 
     * @param string $url
     * 
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets url.
     * 
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
