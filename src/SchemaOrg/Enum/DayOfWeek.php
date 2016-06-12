<?php

namespace SchemaOrg\Enum;

use MyCLabs\Enum\Enum;

/**
 * The day of the week, e.g. used to specify to which day the opening hours of an OpeningHoursSpecification refer. Originally, URLs from [GoodRelations](http://purl.org/goodrelations/v1) were used (for [[Monday]], [[Tuesday]], [[Wednesday]], [[Thursday]], [[Friday]], [[Saturday]], [[Sunday]] plus a special entry for [[PublicHolidays]]); these have now been integrated directly into schema.org.
 * 
 * @see http://schema.org/DayOfWeek Documentation on Schema.org
 * @Iri("http://schema.org/DayOfWeek")
 */
class DayOfWeek extends Enum
{
    /**
     * @var string This stands for any day that is a public holiday; it is a placeholder for all official public holidays in some particular location. While not technically a "day of the week", it can be used with [[OpeningHoursSpecification]]. In the context of an opening hours specification it can be used to indicate opening hours on public holidays, overriding general opening hours for the day of the week on which a public holiday occurs.
     */
    const PUBLIC_HOLIDAYS = 'http://schema.org/PublicHolidays';
    /**
     * @var string The day of the week between Sunday and Tuesday.
     */
    const MONDAY = 'http://schema.org/Monday';
    /**
     * @var string The day of the week between Monday and Wednesday.
     */
    const TUESDAY = 'http://schema.org/Tuesday';
    /**
     * @var string The day of the week between Tuesday and Thursday.
     */
    const WEDNESDAY = 'http://schema.org/Wednesday';
    /**
     * @var string The day of the week between Wednesday and Friday.
     */
    const THURSDAY = 'http://schema.org/Thursday';
    /**
     * @var string The day of the week between Thursday and Saturday.
     */
    const FRIDAY = 'http://schema.org/Friday';
    /**
     * @var string The day of the week between Friday and Sunday.
     */
    const SATURDAY = 'http://schema.org/Saturday';
    /**
     * @var string The day of the week between Saturday and Monday.
     */
    const SUNDAY = 'http://schema.org/Sunday';

    /**
     * @var string The name of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     */
    private $name;

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
