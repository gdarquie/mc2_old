<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quotation
 *
 * @ORM\Table(name="quotation")
 * @ORM\Entity
 */
class Quotation
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="external", type="text", length=65535, nullable=true)
     */
    private $external;

    /**
     * @var integer
     *
     * @ORM\Column(name="quotation_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $quotationId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Song", mappedBy="quotation")
     */
    private $song;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Person", mappedBy="quotation")
     */
    private $person;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", mappedBy="quotation")
     */
    private $numberNumber;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->song = new \Doctrine\Common\Collections\ArrayCollection();
        $this->person = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numberNumber = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Quotation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set external
     *
     * @param string $external
     *
     * @return Quotation
     */
    public function setExternal($external)
    {
        $this->external = $external;

        return $this;
    }

    /**
     * Get external
     *
     * @return string
     */
    public function getExternal()
    {
        return $this->external;
    }

    /**
     * Get quotationId
     *
     * @return integer
     */
    public function getQuotationId()
    {
        return $this->quotationId;
    }

    /**
     * Add song
     *
     * @param \AppBundle\Entity\Song $song
     *
     * @return Quotation
     */
    public function addSong(\AppBundle\Entity\Song $song)
    {
        $this->song[] = $song;

        return $this;
    }

    /**
     * Remove song
     *
     * @param \AppBundle\Entity\Song $song
     */
    public function removeSong(\AppBundle\Entity\Song $song)
    {
        $this->song->removeElement($song);
    }

    /**
     * Get song
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Add person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return Quotation
     */
    public function addPerson(\AppBundle\Entity\Person $person)
    {
        $this->person[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \AppBundle\Entity\Person $person
     */
    public function removePerson(\AppBundle\Entity\Person $person)
    {
        $this->person->removeElement($person);
    }

    /**
     * Get person
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Add numberNumber
     *
     * @param \AppBundle\Entity\Number $numberNumber
     *
     * @return Quotation
     */
    public function addNumberNumber(\AppBundle\Entity\Number $numberNumber)
    {
        $this->numberNumber[] = $numberNumber;

        return $this;
    }

    /**
     * Remove numberNumber
     *
     * @param \AppBundle\Entity\Number $numberNumber
     */
    public function removeNumberNumber(\AppBundle\Entity\Number $numberNumber)
    {
        $this->numberNumber->removeElement($numberNumber);
    }

    /**
     * Get numberNumber
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumberNumber()
    {
        return $this->numberNumber;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
