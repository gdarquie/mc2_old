<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Socialplace
 *
 * @ORM\Table(name="socialPlace")
 * @ORM\Entity
 */
class Socialplace
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="socialPlace_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $socialplaceId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", mappedBy="socialplace")
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
     * @return Socialplace
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
     * Get socialplaceId
     *
     * @return integer
     */
    public function getSocialplaceId()
    {
        return $this->socialplaceId;
    }

    /**
     * Add numberNumber
     *
     * @param \AppBundle\Entity\Number $numberNumber
     *
     * @return Socialplace
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
