<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exoticism
 *
 * @ORM\Table(name="exoticism")
 * @ORM\Entity
 */
class Exoticism
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=500, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="exoticism_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $exoticismId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", mappedBy="exoticism")
     */
    private $numberNumber;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numberNumber = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Exoticism
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
     * Get exoticismId
     *
     * @return integer
     */
    public function getExoticismId()
    {
        return $this->exoticismId;
    }

    /**
     * Add numberNumber
     *
     * @param \AppBundle\Entity\Number $numberNumber
     *
     * @return Exoticism
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
}
