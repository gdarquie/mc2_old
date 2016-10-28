<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ensemble
 *
 * @ORM\Table(name="ensemble")
 * @ORM\Entity
 */
class Ensemble
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="ensemble_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ensembleId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Stagenumber", inversedBy="ensemble")
     * @ORM\JoinTable(name="stagenumber_has_ensemble",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ensemble_id", referencedColumnName="ensemble_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   }
     * )
     */
    private $stagenumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", inversedBy="ensemble")
     * @ORM\JoinTable(name="number_has_ensemble",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ensemble_id", referencedColumnName="ensemble_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
     *   }
     * )
     */
    private $number;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stagenumber = new \Doctrine\Common\Collections\ArrayCollection();
        $this->number = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Ensemble
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
     * @return Ensemble
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
     * Get ensembleId
     *
     * @return integer
     */
    public function getEnsembleId()
    {
        return $this->ensembleId;
    }

    /**
     * Add stagenumber
     *
     * @param \AppBundle\Entity\Stagenumber $stagenumber
     *
     * @return Ensemble
     */
    public function addStagenumber(\AppBundle\Entity\Stagenumber $stagenumber)
    {
        $this->stagenumber[] = $stagenumber;

        return $this;
    }

    /**
     * Remove stagenumber
     *
     * @param \AppBundle\Entity\Stagenumber $stagenumber
     */
    public function removeStagenumber(\AppBundle\Entity\Stagenumber $stagenumber)
    {
        $this->stagenumber->removeElement($stagenumber);
    }

    /**
     * Get stagenumber
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStagenumber()
    {
        return $this->stagenumber;
    }

    /**
     * Add number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return Ensemble
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

    public function __toString()
    {
        return $this->getTitle();
    }
}
