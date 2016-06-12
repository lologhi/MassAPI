<?php

namespace MassAPIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A country.
 * 
 * @see http://schema.org/Country Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/Country")
 */
class Country
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
     * @var GeoShape The geo coordinates of the place.
     * 
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\GeoShape")
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
     * @var string The name of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     */
    private $name;

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
     * Sets geo.
     * 
     * @param GeoShape $geo
     * 
     * @return $this
     */
    public function setGeo(GeoShape $geo = null)
    {
        $this->geo = $geo;

        return $this;
    }

    /**
     * Gets geo.
     * 
     * @return GeoShape
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
