<?php

namespace MassAPIBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 * 
 * @see http://schema.org/CreativeWork Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/CreativeWork")
 */
class CreativeWork
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
     * @var ArrayCollection<Person> The author of this content. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.
     * 
     * @ORM\ManyToMany(targetEntity="MassAPIBundle\Entity\Person")
     * @Iri("https://schema.org/author")
     */
    private $author;
    /**
     * @var \DateTime Date of first broadcast/publication.
     * 
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date
     * @Iri("https://schema.org/datePublished")
     */
    private $datePublished;
    /**
     * @var string A description of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/description")
     */
    private $description;
    /**
     * @var string Genre of the creative work or group.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/genre")
     */
    private $genre;
    /**
     * @var string The name of the item.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     */
    private $name;
    /**
     * @var Organization The publisher of the creative work.
     * 
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\Organization")
     * @Iri("https://schema.org/publisher")
     */
    private $publisher;
    /**
     * @var Event The Event where the CreativeWork was recorded. The CreativeWork may capture all or part of the event.
     * 
     * @ORM\OneToOne(targetEntity="MassAPIBundle\Entity\Event")
     * @Iri("https://schema.org/recordedAt")
     */
    private $recordedAt;
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
        $this->author = new ArrayCollection();
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
     * Adds author.
     * 
     * @param Person $author
     * 
     * @return $this
     */
    public function addAuthor(Person $author)
    {
        $this->author[] = $author;

        return $this;
    }

    /**
     * Removes author.
     * 
     * @param Person $author
     * 
     * @return $this
     */
    public function removeAuthor(Person $author)
    {
        $this->author->removeElement($author);

        return $this;
    }

    /**
     * Gets author.
     * 
     * @return ArrayCollection<Person>
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets datePublished.
     * 
     * @param \DateTime $datePublished
     * 
     * @return $this
     */
    public function setDatePublished(\DateTime $datePublished = null)
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    /**
     * Gets datePublished.
     * 
     * @return \DateTime
     */
    public function getDatePublished()
    {
        return $this->datePublished;
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
     * Sets genre.
     * 
     * @param string $genre
     * 
     * @return $this
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Gets genre.
     * 
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
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
     * Sets publisher.
     * 
     * @param Organization $publisher
     * 
     * @return $this
     */
    public function setPublisher(Organization $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Gets publisher.
     * 
     * @return Organization
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Sets recordedAt.
     * 
     * @param Event $recordedAt
     * 
     * @return $this
     */
    public function setRecordedAt(Event $recordedAt = null)
    {
        $this->recordedAt = $recordedAt;

        return $this;
    }

    /**
     * Gets recordedAt.
     * 
     * @return Event
     */
    public function getRecordedAt()
    {
        return $this->recordedAt;
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
