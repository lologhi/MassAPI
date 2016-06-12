<?php

namespace MassAPIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use SchemaOrg\Enum\DayOfWeek;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A structured value providing information about the opening hours of a place or a certain service inside a place.   
 *  The place is **open** if the [opens](/opens) property is specified, and **closed** otherwise.   
 *  If the value for the [closes](/closes) property is less than the value for the [opens](/opens) property then the hour range is assumed to span over the next day.
 * 
 * @see http://schema.org/OpeningHoursSpecification Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/OpeningHoursSpecification")
 */
class OpeningHoursSpecification
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
     * @var \DateTime The closing hour of the place or service on the given day(s) of the week.
     * 
     * @ORM\Column(type="time")
     * @Assert\Time
     * @Assert\NotNull
     * @Iri("https://schema.org/closes")
     */
    private $closes;
    /**
     * @var string[] The day of the week for which these opening hours are valid.
     * 
     * @ORM\Column(type="simple_array")
     * @Assert\NotNull
     * @Assert\Choice(callback={"DayOfWeek", "toArray"}, multiple=true)
     * @Iri("https://schema.org/dayOfWeek")
     */
    private $dayOfWeek = [];
    /**
     * @var \DateTime The opening hour of the place or service on the given day(s) of the week.
     * 
     * @ORM\Column(type="time")
     * @Assert\Time
     * @Assert\NotNull
     * @Iri("https://schema.org/opens")
     */
    private $opens;
    /**
     * @var \DateTime The date when the item becomes valid.
     * 
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     * @Iri("https://schema.org/validFrom")
     */
    private $validFrom;
    /**
     * @var \DateTime The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.
     * 
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     * @Iri("https://schema.org/validThrough")
     */
    private $validThrough;

    public function __construct()
    {
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
     * Sets closes.
     * 
     * @param \DateTime $closes
     * 
     * @return $this
     */
    public function setCloses(\DateTime $closes)
    {
        $this->closes = $closes;

        return $this;
    }

    /**
     * Gets closes.
     * 
     * @return \DateTime
     */
    public function getCloses()
    {
        return $this->closes;
    }

    /**
     * Adds dayOfWeek.
     * 
     * @param string[] $dayOfWeek
     * 
     * @return $this
     */
    public function addDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek[] = (string) $dayOfWeek;

        return $this;
    }

    /**
     * Removes dayOfWeek.
     * 
     * @param string[] $dayOfWeek
     * 
     * @return $this
     */
    public function removeDayOfWeek($dayOfWeek)
    {
        $key = array_search((string) $dayOfWeek, $this->dayOfWeek, true);
        if (false !== $key) {
            unset($this->dayOfWeek[$key]);
        }

        return $this;
    }

    /**
     * Gets dayOfWeek.
     * 
     * @return string[]
     */
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    /**
     * Sets opens.
     * 
     * @param \DateTime $opens
     * 
     * @return $this
     */
    public function setOpens(\DateTime $opens)
    {
        $this->opens = $opens;

        return $this;
    }

    /**
     * Gets opens.
     * 
     * @return \DateTime
     */
    public function getOpens()
    {
        return $this->opens;
    }

    /**
     * Sets validFrom.
     * 
     * @param \DateTime $validFrom
     * 
     * @return $this
     */
    public function setValidFrom(\DateTime $validFrom = null)
    {
        $this->validFrom = $validFrom;

        return $this;
    }

    /**
     * Gets validFrom.
     * 
     * @return \DateTime
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * Sets validThrough.
     * 
     * @param \DateTime $validThrough
     * 
     * @return $this
     */
    public function setValidThrough(\DateTime $validThrough = null)
    {
        $this->validThrough = $validThrough;

        return $this;
    }

    /**
     * Gets validThrough.
     * 
     * @return \DateTime
     */
    public function getValidThrough()
    {
        return $this->validThrough;
    }
}
