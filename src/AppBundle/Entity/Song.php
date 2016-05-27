<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Song
 *
 * @ORM\Table(name="song")
 * @ORM\Entity
 */
class Song
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
     * @ORM\Column(name="date", type="string", length=45, nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="song_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $songId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Radio", inversedBy="song")
     * @ORM\JoinTable(name="song_has_radio",
     *   joinColumns={
     *     @ORM\JoinColumn(name="song_id", referencedColumnName="song_id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Stagenumber", inversedBy="song")
     * @ORM\JoinTable(name="song_has_stagenumber",
     *   joinColumns={
     *     @ORM\JoinColumn(name="song_id", referencedColumnName="song_id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Quotation", inversedBy="song")
     * @ORM\JoinTable(name="song_has_quotation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="song_id", referencedColumnName="song_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="quotation_id", referencedColumnName="quotation_id")
     *   }
     * )
     */
    private $quotation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Disc", inversedBy="song")
     * @ORM\JoinTable(name="song_has_disc",
     *   joinColumns={
     *     @ORM\JoinColumn(name="song_id", referencedColumnName="song_id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Songtype", inversedBy="song")
     * @ORM\JoinTable(name="songtype_has_song",
     *   joinColumns={
     *     @ORM\JoinColumn(name="song_id", referencedColumnName="song_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="songType_id", referencedColumnName="songType_id")
     *   }
     * )
     */
    private $songtype;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tv", inversedBy="song")
     * @ORM\JoinTable(name="song_has_tv",
     *   joinColumns={
     *     @ORM\JoinColumn(name="song_id", referencedColumnName="song_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="TV_id", referencedColumnName="TV_id")
     *   }
     * )
     */
    private $tv;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", mappedBy="song")
     */
    private $number;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->radio = new \Doctrine\Common\Collections\ArrayCollection();
        $this->stagenumber = new \Doctrine\Common\Collections\ArrayCollection();
        $this->quotation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->disc = new \Doctrine\Common\Collections\ArrayCollection();
        $this->songtype = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tv = new \Doctrine\Common\Collections\ArrayCollection();
        $this->number = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Song
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
     * Set date
     *
     * @param string $date
     *
     * @return Song
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Song
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
     * Get songId
     *
     * @return integer
     */
    public function getSongId()
    {
        return $this->songId;
    }

    /**
     * Add radio
     *
     * @param \AppBundle\Entity\Radio $radio
     *
     * @return Song
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
     * Add stagenumber
     *
     * @param \AppBundle\Entity\Stagenumber $stagenumber
     *
     * @return Song
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
     * Add quotation
     *
     * @param \AppBundle\Entity\Quotation $quotation
     *
     * @return Song
     */
    public function addQuotation(\AppBundle\Entity\Quotation $quotation)
    {
        $this->quotation[] = $quotation;

        return $this;
    }

    /**
     * Remove quotation
     *
     * @param \AppBundle\Entity\Quotation $quotation
     */
    public function removeQuotation(\AppBundle\Entity\Quotation $quotation)
    {
        $this->quotation->removeElement($quotation);
    }

    /**
     * Get quotation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuotation()
    {
        return $this->quotation;
    }

    /**
     * Add disc
     *
     * @param \AppBundle\Entity\Disc $disc
     *
     * @return Song
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
     * Add songtype
     *
     * @param \AppBundle\Entity\Songtype $songtype
     *
     * @return Song
     */
    public function addSongtype(\AppBundle\Entity\Songtype $songtype)
    {
        $this->songtype[] = $songtype;

        return $this;
    }

    /**
     * Remove songtype
     *
     * @param \AppBundle\Entity\Songtype $songtype
     */
    public function removeSongtype(\AppBundle\Entity\Songtype $songtype)
    {
        $this->songtype->removeElement($songtype);
    }

    /**
     * Get songtype
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSongtype()
    {
        return $this->songtype;
    }

    /**
     * Add tv
     *
     * @param \AppBundle\Entity\Tv $tv
     *
     * @return Song
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

    /**
     * Add number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return Song
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
