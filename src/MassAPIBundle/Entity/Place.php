<?php

namespace MassAPIBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entities that have a somewhat fixed, physical extension.
 * 
 * @see http://schema.org/Place Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/Place")
 */
class Place
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
     * @var PostalAddress Physical address of the item.
     * 
     * @ORM\ManyToOne(targetEntity="MassAPIBundle\Entity\PostalAddress")
     * @Iri("https://schema.org/address")
     */
    private $address;
    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item.
     * 
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\AggregateRating")
     * @Iri("https://schema.org/aggregateRating")
     */
    private $aggregateRating;
    /**
     * @var ArrayCollection<Place> The basic containment relation between a place and one that contains it.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Place")
     * @ORM\JoinTable(name="place_contained_in")
     * @Iri("https://schema.org/containedInPlace")
     */
    private $containedInPlace;
    /**
     * @var ArrayCollection<Place> The basic containment relation between a place and another that it contains.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Place")
     * @ORM\JoinTable(name="place_contains")
     * @Iri("https://schema.org/containsPlace")
     */
    private $containsPlace;
    /**
     * @var ArrayCollection<Event> Upcoming or past event associated with this place, organization, or action.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Event")
     * @Iri("https://schema.org/event")
     */
    private $event;
    /**
     * @var string The fax number.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/faxNumber")
     */
    private $faxNumber;
    /**
     * @var GeoCoordinates The geo coordinates of the place.
     * 
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\GeoCoordinates")
     * @Iri("https://schema.org/geo")
     */
    private $geo;
    /**
     * @var string The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/globalLocationNumber")
     */
    private $globalLocationNumber;
    /**
     * @var ImageObject An associated logo.
     * 
     * @ORM\ManyToOne(targetEntity="MassAPIBundle\Entity\ImageObject")
     * @Iri("https://schema.org/logo")
     */
    private $logo;
    /**
     * @var string A URL to a map of the place.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Url
     * @Iri("https://schema.org/hasMap")
     */
    private $hasMap;
    /**
     * @var OpeningHoursSpecification The opening hours of a certain place.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\OpeningHoursSpecification")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @Iri("https://schema.org/openingHoursSpecification")
     */
    private $openingHoursSpecification;
    /**
     * @var OpeningHoursSpecification The special opening hours of a certain place.   
     *                                Use this to explicitly override general opening hours brought in scope by [openingHoursSpecification](/openingHoursSpecification) or [openingHours](/openingHours).
     * 
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\OpeningHoursSpecification")
     * @Iri("https://schema.org/specialOpeningHoursSpecification")
     */
    private $specialOpeningHoursSpecification;
    /**
     * @var ImageObject A photograph of this place.
     * 
     * @ORM\ManyToOne(targetEntity="MassAPIBundle\Entity\ImageObject")
     * @Iri("https://schema.org/photo")
     */
    private $photo;
    /**
     * @var ArrayCollection<Review> A review of the item.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Review")
     * @Iri("https://schema.org/review")
     */
    private $review;
    /**
     * @var string The telephone number.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/telephone")
     */
    private $telephone;

    public function __construct()
    {
        $this->containedInPlace = new ArrayCollection();
        $this->containsPlace = new ArrayCollection();
        $this->event = new ArrayCollection();
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
     * Sets address.
     * 
     * @param PostalAddress $address
     * 
     * @return $this
     */
    public function setAddress(PostalAddress $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets address.
     * 
     * @return PostalAddress
     */
    public function getAddress()
    {
        return $this->address;
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
     * Adds containedInPlace.
     * 
     * @param Place $containedInPlace
     * 
     * @return $this
     */
    public function addContainedInPlace(Place $containedInPlace)
    {
        $this->containedInPlace[] = $containedInPlace;

        return $this;
    }

    /**
     * Removes containedInPlace.
     * 
     * @param Place $containedInPlace
     * 
     * @return $this
     */
    public function removeContainedInPlace(Place $containedInPlace)
    {
        $this->containedInPlace->removeElement($containedInPlace);

        return $this;
    }

    /**
     * Gets containedInPlace.
     * 
     * @return ArrayCollection<Place>
     */
    public function getContainedInPlace()
    {
        return $this->containedInPlace;
    }

    /**
     * Adds containsPlace.
     * 
     * @param Place $containsPlace
     * 
     * @return $this
     */
    public function addContainsPlace(Place $containsPlace)
    {
        $this->containsPlace[] = $containsPlace;

        return $this;
    }

    /**
     * Removes containsPlace.
     * 
     * @param Place $containsPlace
     * 
     * @return $this
     */
    public function removeContainsPlace(Place $containsPlace)
    {
        $this->containsPlace->removeElement($containsPlace);

        return $this;
    }

    /**
     * Gets containsPlace.
     * 
     * @return ArrayCollection<Place>
     */
    public function getContainsPlace()
    {
        return $this->containsPlace;
    }

    /**
     * Adds event.
     * 
     * @param Event $event
     * 
     * @return $this
     */
    public function addEvent(Event $event)
    {
        $this->event[] = $event;

        return $this;
    }

    /**
     * Removes event.
     * 
     * @param Event $event
     * 
     * @return $this
     */
    public function removeEvent(Event $event)
    {
        $this->event->removeElement($event);

        return $this;
    }

    /**
     * Gets event.
     * 
     * @return ArrayCollection<Event>
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets faxNumber.
     * 
     * @param string $faxNumber
     * 
     * @return $this
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * Gets faxNumber.
     * 
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * Sets geo.
     * 
     * @param GeoCoordinates $geo
     * 
     * @return $this
     */
    public function setGeo(GeoCoordinates $geo = null)
    {
        $this->geo = $geo;

        return $this;
    }

    /**
     * Gets geo.
     * 
     * @return GeoCoordinates
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * Sets globalLocationNumber.
     * 
     * @param string $globalLocationNumber
     * 
     * @return $this
     */
    public function setGlobalLocationNumber($globalLocationNumber)
    {
        $this->globalLocationNumber = $globalLocationNumber;

        return $this;
    }

    /**
     * Gets globalLocationNumber.
     * 
     * @return string
     */
    public function getGlobalLocationNumber()
    {
        return $this->globalLocationNumber;
    }

    /**
     * Sets logo.
     * 
     * @param ImageObject $logo
     * 
     * @return $this
     */
    public function setLogo(ImageObject $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Gets logo.
     * 
     * @return ImageObject
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets hasMap.
     * 
     * @param string $hasMap
     * 
     * @return $this
     */
    public function setHasMap($hasMap)
    {
        $this->hasMap = $hasMap;

        return $this;
    }

    /**
     * Gets hasMap.
     * 
     * @return string
     */
    public function getHasMap()
    {
        return $this->hasMap;
    }

    /**
     * Sets openingHoursSpecification.
     * 
     * @param OpeningHoursSpecification $openingHoursSpecification
     * 
     * @return $this
     */
    public function setOpeningHoursSpecification(OpeningHoursSpecification $openingHoursSpecification = null)
    {
        $this->openingHoursSpecification = $openingHoursSpecification;

        return $this;
    }

    /**
     * Gets openingHoursSpecification.
     * 
     * @return OpeningHoursSpecification
     */
    public function getOpeningHoursSpecification()
    {
        return $this->openingHoursSpecification;
    }

    /**
     * Sets specialOpeningHoursSpecification.
     * 
     * @param OpeningHoursSpecification $specialOpeningHoursSpecification
     * 
     * @return $this
     */
    public function setSpecialOpeningHoursSpecification(OpeningHoursSpecification $specialOpeningHoursSpecification = null)
    {
        $this->specialOpeningHoursSpecification = $specialOpeningHoursSpecification;

        return $this;
    }

    /**
     * Gets specialOpeningHoursSpecification.
     * 
     * @return OpeningHoursSpecification
     */
    public function getSpecialOpeningHoursSpecification()
    {
        return $this->specialOpeningHoursSpecification;
    }

    /**
     * Sets photo.
     * 
     * @param ImageObject $photo
     * 
     * @return $this
     */
    public function setPhoto(ImageObject $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Gets photo.
     * 
     * @return ImageObject
     */
    public function getPhoto()
    {
        return $this->photo;
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
     * Sets telephone.
     * 
     * @param string $telephone
     * 
     * @return $this
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Gets telephone.
     * 
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
}
