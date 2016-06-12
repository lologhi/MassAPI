<?php

namespace MassAPIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An image file.
 * 
 * @see http://schema.org/ImageObject Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/ImageObject")
 */
class ImageObject
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
     * @var string The caption for this object.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/caption")
     */
    private $caption;
    /**
     * @var string exif data for this object.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/exifData")
     */
    private $exifData;
    /**
     * @var ImageObject Thumbnail image for an image or video.
     * 
     * @ORM\ManyToOne(targetEntity="MassAPIBundle\Entity\ImageObject")
     * @Iri("https://schema.org/thumbnail")
     */
    private $thumbnail;

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
     * Sets caption.
     * 
     * @param string $caption
     * 
     * @return $this
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Gets caption.
     * 
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Sets exifData.
     * 
     * @param string $exifData
     * 
     * @return $this
     */
    public function setExifData($exifData)
    {
        $this->exifData = $exifData;

        return $this;
    }

    /**
     * Gets exifData.
     * 
     * @return string
     */
    public function getExifData()
    {
        return $this->exifData;
    }

    /**
     * Sets thumbnail.
     * 
     * @param ImageObject $thumbnail
     * 
     * @return $this
     */
    public function setThumbnail(ImageObject $thumbnail = null)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Gets thumbnail.
     * 
     * @return ImageObject
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }
}
