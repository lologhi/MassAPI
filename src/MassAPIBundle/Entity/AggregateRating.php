<?php

namespace MassAPIBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The average rating based on multiple ratings or reviews.
 * 
 * @see http://schema.org/AggregateRating Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/AggregateRating")
 */
class AggregateRating
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
     * @var ArrayCollection<Event> The item that is being reviewed/rated.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Event")
     * @Iri("https://schema.org/itemReviewed")
     */
    private $itemReviewed;
    /**
     * @var int The count of total number of ratings.
     * 
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Iri("https://schema.org/ratingCount")
     */
    private $ratingCount;
    /**
     * @var int The count of total number of reviews.
     * 
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Iri("https://schema.org/reviewCount")
     */
    private $reviewCount;

    public function __construct()
    {
        $this->itemReviewed = new ArrayCollection();
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
     * Adds itemReviewed.
     * 
     * @param Event $itemReviewed
     * 
     * @return $this
     */
    public function addItemReviewed(Event $itemReviewed)
    {
        $this->itemReviewed[] = $itemReviewed;

        return $this;
    }

    /**
     * Removes itemReviewed.
     * 
     * @param Event $itemReviewed
     * 
     * @return $this
     */
    public function removeItemReviewed(Event $itemReviewed)
    {
        $this->itemReviewed->removeElement($itemReviewed);

        return $this;
    }

    /**
     * Gets itemReviewed.
     * 
     * @return ArrayCollection<Event>
     */
    public function getItemReviewed()
    {
        return $this->itemReviewed;
    }

    /**
     * Sets ratingCount.
     * 
     * @param int $ratingCount
     * 
     * @return $this
     */
    public function setRatingCount($ratingCount)
    {
        $this->ratingCount = $ratingCount;

        return $this;
    }

    /**
     * Gets ratingCount.
     * 
     * @return int
     */
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * Sets reviewCount.
     * 
     * @param int $reviewCount
     * 
     * @return $this
     */
    public function setReviewCount($reviewCount)
    {
        $this->reviewCount = $reviewCount;

        return $this;
    }

    /**
     * Gets reviewCount.
     * 
     * @return int
     */
    public function getReviewCount()
    {
        return $this->reviewCount;
    }
}
