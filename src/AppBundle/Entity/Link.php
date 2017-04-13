<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="link")
 * @ORM\Entity
 */
class Link
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
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
     * @ORM\Column(name="link_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $linkId;

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
     * @var \AppBundle\Entity\Tv
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TV_id", referencedColumnName="TV_id")
     * })
     */
    private $tv;

    /**
     * @var \AppBundle\Entity\Stagenumber
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Stagenumber")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stagenumber_id", referencedColumnName="stagenumber_id")
     * })
     */
    private $stagenumber;

    /**
     * @var \AppBundle\Entity\Radio
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Radio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="radio_id", referencedColumnName="radio_id")
     * })
     */
    private $radio;

    /**
     * @var \AppBundle\Entity\Number
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Number")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
     * })
     */
    private $number;

    /**
     * @var \AppBundle\Entity\Disc
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Disc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disc_id", referencedColumnName="disc_id")
     * })
     */
    private $disc;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Link
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
     * @return Link
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
     * @return Link
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
     * Get linkId
     *
     * @return integer
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

    /**
     * Set stageshow
     *
     * @param \AppBundle\Entity\Stageshow $stageshow
     *
     * @return Link
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
     * Set tv
     *
     * @param \AppBundle\Entity\Tv $tv
     *
     * @return Link
     */
    public function setTv(\AppBundle\Entity\Tv $tv = null)
    {
        $this->tv = $tv;

        return $this;
    }

    /**
     * Get tv
     *
     * @return \AppBundle\Entity\Tv
     */
    public function getTv()
    {
        return $this->tv;
    }

    /**
     * Set stagenumber
     *
     * @param \AppBundle\Entity\Stagenumber $stagenumber
     *
     * @return Link
     */
    public function setStagenumber(\AppBundle\Entity\Stagenumber $stagenumber = null)
    {
        $this->stagenumber = $stagenumber;

        return $this;
    }

    /**
     * Get stagenumber
     *
     * @return \AppBundle\Entity\Stagenumber
     */
    public function getStagenumber()
    {
        return $this->stagenumber;
    }

    /**
     * Set radio
     *
     * @param \AppBundle\Entity\Radio $radio
     *
     * @return Link
     */
    public function setRadio(\AppBundle\Entity\Radio $radio = null)
    {
        $this->radio = $radio;

        return $this;
    }

    /**
     * Get radio
     *
     * @return \AppBundle\Entity\Radio
     */
    public function getRadio()
    {
        return $this->radio;
    }

    /**
     * Set number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return Link
     */
    public function setNumber(\AppBundle\Entity\Number $number = null)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return \AppBundle\Entity\Number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set disc
     *
     * @param \AppBundle\Entity\Disc $disc
     *
     * @return Link
     */
    public function setDisc(\AppBundle\Entity\Disc $disc = null)
    {
        $this->disc = $disc;

        return $this;
    }

    /**
     * Get disc
     *
     * @return \AppBundle\Entity\Disc
     */
    public function getDisc()
    {
        return $this->disc;
    }
}
