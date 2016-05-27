<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Effects
 *
 * @ORM\Table(name="effects")
 * @ORM\Entity
 */
class Effects
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
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="effects_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $effectsId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", mappedBy="effects")
     */
    private $number;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->number = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Effects
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
     * Set type
     *
     * @param string $type
     *
     * @return Effects
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Effects
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get effectsId
     *
     * @return integer
     */
    public function getEffectsId()
    {
        return $this->effectsId;
    }

    /**
     * Add number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return Effects
     */
    public function addNumber(\AppBundle\Entity\Number $number)
    {
        $this->number[] = $number;

        return $this;
    }

    /**
     * Remove number
     *
     * @param \AppBundle\Entity\Number $number
     */
    public function removeNumber(\AppBundle\Entity\Number $number)
    {
        $this->number->removeElement($number);
    }

    /**
     * Get number
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumber()
    {
        return $this->number;
    }
}
