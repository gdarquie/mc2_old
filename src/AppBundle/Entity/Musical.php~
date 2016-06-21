<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musical
 *
 * @ORM\Table(name="musical")
 * @ORM\Entity
 */
class Musical
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
     * @var integer
     *
     * @ORM\Column(name="musical_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $musicalId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Stagenumber", inversedBy="musical")
     * @ORM\JoinTable(name="musical_has_stagenumber",
     *   joinColumns={
     *     @ORM\JoinColumn(name="musical_id", referencedColumnName="musical_id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Radio", inversedBy="musical")
     * @ORM\JoinTable(name="musical_has_radio",
     *   joinColumns={
     *     @ORM\JoinColumn(name="musical_id", referencedColumnName="musical_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="radio_id", referencedColumnName="radio_id")
     *   }
     * )
     */
    private $radio;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", inversedBy="musical")
     * @ORM\JoinTable(name="musical_has_number",
     *   joinColumns={
     *     @ORM\JoinColumn(name="musical_id", referencedColumnName="musical_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
     *   }
     * )
     */
    private $number;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Disc", inversedBy="musical")
     * @ORM\JoinTable(name="musical_has_disc",
     *   joinColumns={
     *     @ORM\JoinColumn(name="musical_id", referencedColumnName="musical_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="disc_id", referencedColumnName="disc_id")
     *   }
     * )
     */
    private $disc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tv", inversedBy="musical")
     * @ORM\JoinTable(name="musical_has_tv",
     *   joinColumns={
     *     @ORM\JoinColumn(name="musical_id", referencedColumnName="musical_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="TV_id", referencedColumnName="TV_id")
     *   }
     * )
     */
    private $tv;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stagenumber = new \Doctrine\Common\Collections\ArrayCollection();
        $this->radio = new \Doctrine\Common\Collections\ArrayCollection();
        $this->number = new \Doctrine\Common\Collections\ArrayCollection();
        $this->disc = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tv = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Musical
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
     * @return Musical
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
     * Get musicalId
     *
     * @return integer
     */
    public function getMusicalId()
    {
        return $this->musicalId;
    }

    /**
     * Add stagenumber
     *
     * @param \AppBundle\Entity\Stagenumber $stagenumber
     *
     * @return Musical
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
     * Add radio
     *
     * @param \AppBundle\Entity\Radio $radio
     *
     * @return Musical
     */
    public function addRadio(\AppBundle\Entity\Radio $radio)
    {
        $this->radio[] = $radio;

        return $this;
    }

    /**
     * Remove radio
     *
     * @param \AppBundle\Entity\Radio $radio
     */
    public function removeRadio(\AppBundle\Entity\Radio $radio)
    {
        $this->radio->removeElement($radio);
    }

    /**
     * Get radio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRadio()
    {
        return $this->radio;
    }

    /**
     * Add number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return Musical
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
     * Add disc
     *
     * @param \AppBundle\Entity\Disc $disc
     *
     * @return Musical
     */
    public function addDisc(\AppBundle\Entity\Disc $disc)
    {
        $this->disc[] = $disc;

        return $this;
    }

    /**
     * Remove disc
     *
     * @param \AppBundle\Entity\Disc $disc
     */
    public function removeDisc(\AppBundle\Entity\Disc $disc)
    {
        $this->disc->removeElement($disc);
    }

    /**
     * Get disc
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisc()
    {
        return $this->disc;
    }

    /**
     * Add tv
     *
     * @param \AppBundle\Entity\Tv $tv
     *
     * @return Musical
     */
    public function addTv(\AppBundle\Entity\Tv $tv)
    {
        $this->tv[] = $tv;

        return $this;
    }

    /**
     * Remove tv
     *
     * @param \AppBundle\Entity\Tv $tv
     */
    public function removeTv(\AppBundle\Entity\Tv $tv)
    {
        $this->tv->removeElement($tv);
    }

    /**
     * Get tv
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTv()
    {
        return $this->tv;
    }
}
