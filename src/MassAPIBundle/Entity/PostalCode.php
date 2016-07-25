<?php

namespace MassAPIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The French postal codes.
 *
 * @ORM\Entity
 */
class PostalCode
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
     * @var integer The postal code. For example, 92500.
     *
     * @ORM\Column(nullable=false)
     * @Assert\Type(type="integer")
     */
    private $postalCode;

    /**
     * @var integer The INSEE code. For example, 92063.
     *
     * @ORM\Column(nullable=false)
     * @Assert\Type(type="integer")
     */
    private $inseeCode;

    /**
     * @var string The city name. For example, Rueil-Malmaison.
     *
     * @ORM\Column(nullable=false)
     * @Assert\Type(type="string")
     */
    private $cityName;

    /**
     * @var string The "departement" name. For example, Hauts-de-Seine.
     *
     * @ORM\Column(nullable=false)
     * @Assert\Type(type="string")
     */
    private $departementName;

    /**
     * @var string The "region" name. For example, Île-de-France.
     *
     * @ORM\Column(nullable=false)
     * @Assert\Type(type="string")
     */
    private $regionName;

    /**
     * @var GeoCoordinates The geo coordinates of the place.
     *
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\GeoCoordinates", cascade={"persist"})
     */
    private $geo;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param int $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return int
     */
    public function getInseeCode()
    {
        return $this->inseeCode;
    }

    /**
     * @param int $inseeCode
     */
    public function setInseeCode($inseeCode)
    {
        $this->inseeCode = $inseeCode;
    }

    /**
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * @param string $cityName
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
    }

    /**
     * @return string
     */
    public function getDepartementName()
    {
        return $this->departementName;
    }

    /**
     * @param string $departementName
     */
    public function setDepartementName($departementName)
    {
        $this->departementName = $departementName;
    }

    /**
     * @return string
     */
    public function getRegionName()
    {
        return $this->regionName;
    }

    /**
     * @param string $regionName
     */
    public function setRegionName($regionName)
    {
        $this->regionName = $regionName;
    }

    /**
     * @return GeoCoordinates
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * @param GeoCoordinates $geo
     */
    public function setGeo($geo)
    {
        $this->geo = $geo;
    }
}
