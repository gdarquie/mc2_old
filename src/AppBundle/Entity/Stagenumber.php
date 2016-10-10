<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stagenumber
 *
 * @ORM\Table(name="stageNumber")
 * @ORM\Entity
 */
class Stagenumber
{
    /**
     * @var integer
     *
     * @ORM\Column(name="group_id", type="integer", nullable=true)
     */
    private $groupId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="order", type="integer", nullable=true)
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="ibdb", type="integer", nullable=true)
     */
    private $ibdb;

    /**
     * @var integer
     *
     * @ORM\Column(name="stageNumber_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stagenumberId;

    /**
     * @var string
     *
     * @ORM\Column(name="setting", type="text", length=1000, nullable=true)
     */
    private $setting;

    /**
     * @var \AppBundle\Entity\Stageshow
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Stageshow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stageShow_id", referencedColumnName="stageShow_id")
     * })
     */
    private $stageshow;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Ensemble", mappedBy="stagenumber")
     */
    private $ensemble;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", mappedBy="stagenumber")
     */
    private $number;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Costumes", mappedBy="stagenumber")
     */
    private $costumes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Musical", mappedBy="stagenumber")
     */
    private $musical;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Dancing", mappedBy="stagenumber")
     */
    private $dancing;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Song", mappedBy="stagenumber")
     */
    private $song;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ensemble = new \Doctrine\Common\Collections\ArrayCollection();
        $this->number = new \Doctrine\Common\Collections\ArrayCollection();
        $this->costumes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->musical = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dancing = new \Doctrine\Common\Collections\ArrayCollection();
        $this->song = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return Stagenumber
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Stagenumber
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
     * Set order
     *
     * @param integer $order
     *
     * @return Stagenumber
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Stagenumber
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
     * @return Stagenumber
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
     * Set ibdb
     *
     * @param integer $ibdb
     *
     * @return Stagenumber
     */
    public function setIbdb($ibdb)
    {
        $this->ibdb = $ibdb;

        return $this;
    }

    /**
     * Get ibdb
     *
     * @return integer
     */
    public function getIbdb()
    {
        return $this->ibdb;
    }

    /**
     * Get stagenumberId
     *
     * @return integer
     */
    public function getStagenumberId()
    {
        return $this->stagenumberId;
    }

    /**
     * @return string
     */
    public function getSetting()
    {
        return $this->setting;
    }

    /**
     * @param string $setting
     */
    public function setSetting($setting)
    {
        $this->setting = $setting;
    }


    /**
     * Set stageshow
     *
     * @param \AppBundle\Entity\Stageshow $stageshow
     *
     * @return Stagenumber
     */
    public function setStageshow(\AppBundle\Entity\Stageshow $stageshow = null)
    {
        $this->stageshow = $stageshow;

        return $this;
    }

    /**
     * Get stageshow
     *
     * @return \AppBundle\Entity\Stageshow
     */
    public function getStageshow()
    {
        return $this->stageshow;
    }

    /**
     * Add ensemble
     *
     * @param \AppBundle\Entity\Ensemble $ensemble
     *
     * @return Stagenumber
     */
    public function addEnsemble(\AppBundle\Entity\Ensemble $ensemble)
    {
        $this->ensemble[] = $ensemble;

        return $this;
    }

    /**
     * Remove ensemble
     *
     * @param \AppBundle\Entity\Ensemble $ensemble
     */
    public function removeEnsemble(\AppBundle\Entity\Ensemble $ensemble)
    {
        $this->ensemble->removeElement($ensemble);
    }

    /**
     * Get ensemble
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnsemble()
    {
        return $this->ensemble;
    }

    /**
     * Add number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return Stagenumber
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

    /**
     * Add costume
     *
     * @param \AppBundle\Entity\Costumes $costume
     *
     * @return Stagenumber
     */
    public function addCostume(\AppBundle\Entity\Costumes $costume)
    {
        $this->costumes[] = $costume;

        return $this;
    }

    /**
     * Remove costume
     *
     * @param \AppBundle\Entity\Costumes $costume
     */
    public function removeCostume(\AppBundle\Entity\Costumes $costume)
    {
        $this->costumes->removeElement($costume);
    }

    /**
     * Get costumes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCostumes()
    {
        return $this->costumes;
    }

    /**
     * Add musical
     *
     * @param \AppBundle\Entity\Musical $musical
     *
     * @return Stagenumber
     */
    public function addMusical(\AppBundle\Entity\Musical $musical)
    {
        $this->musical[] = $musical;

        return $this;
    }

    /**
     * Remove musical
     *
     * @param \AppBundle\Entity\Musical $musical
     */
    public function removeMusical(\AppBundle\Entity\Musical $musical)
    {
        $this->musical->removeElement($musical);
    }

    /**
     * Get musical
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMusical()
    {
        return $this->musical;
    }

    /**
     * Add dancing
     *
     * @param \AppBundle\Entity\Dancing $dancing
     *
     * @return Stagenumber
     */
    public function addDancing(\AppBundle\Entity\Dancing $dancing)
    {
        $this->dancing[] = $dancing;

        return $this;
    }

    /**
     * Remove dancing
     *
     * @param \AppBundle\Entity\Dancing $dancing
     */
    public function removeDancing(\AppBundle\Entity\Dancing $dancing)
    {
        $this->dancing->removeElement($dancing);
    }

    /**
     * Get dancing
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDancing()
    {
        return $this->dancing;
    }

    /**
     * Add song
     *
     * @param \AppBundle\Entity\Song $song
     *
     * @return Stagenumber
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
}
