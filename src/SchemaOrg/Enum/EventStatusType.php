<?php

namespace SchemaOrg\Enum;

use MyCLabs\Enum\Enum;

/**
 * EventStatusType is an enumeration type whose instances represent several states that an Event may be in.
 * 
 * @see http://schema.org/EventStatusType Documentation on Schema.org
 * @Iri("http://schema.org/EventStatusType")
 */
class EventStatusType extends Enum
{
    /**
     * @var string The event has been cancelled. If the event has multiple startDate values, all are assumed to be cancelled. Either startDate or previousStartDate may be used to specify the event's cancelled date(s).
     */
    const EVENT_CANCELLED = 'http://schema.org/EventCancelled';
    /**
     * @var string The event has been postponed and no new date has been set. The event's previousStartDate should be set.
     */
    const EVENT_POSTPONED = 'http://schema.org/EventPostponed';
    /**
     * @var string The event has been rescheduled. The event's previousStartDate should be set to the old date and the startDate should be set to the event's new date. (If the event has been rescheduled multiple times, the previousStartDate property may be repeated).
     */
    const EVENT_RESCHEDULED = 'http://schema.org/EventRescheduled';
    /**
     * @var string The event is taking place or has taken place on the startDate as scheduled. Use of this value is optional, as it is assumed by default.
     */
    const EVENT_SCHEDULED = 'http://schema.org/EventScheduled';

    /**
     * @var string An alias for the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/alternateName")
     */
    private $alternateName;
    /**
     * @var string A description of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/description")
     */
    private $description;
    /**
     * @var string The name of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     */
    private $name;

    /**
     * Sets alternateName.
     * 
     * @param string $alternateName
     * 
     * @return $this
     */
    public function setAlternateName($alternateName)
    {
        $this->alternateName = $alternateName;

        return $this;
    }

    /**
     * Gets alternateName.
     * 
     * @return string
     */
    public function getAlternateName()
    {
        return $this->alternateName;
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
}
