<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Stagenumber
 *
 * @ORM\Table(name="stagenumber")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StagenumberRepository")
 */
class Stagenumber
{

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
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank", type="integer", nullable=true)
     */
    private $order;


    /** @var  \AppBundle\Entity\Thesaurus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Thesaurus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="thesaurus_id")
     * })
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Thesaurus", inversedBy="stagenumber_musicals")
     * @ORM\JoinTable(name="stagenumber_has_musical",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="musical_id", referencedColumnName="thesaurus_id")
     *   }
     * )
     */
    private $musicals;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Thesaurus", inversedBy="stagenumber_dancingstyles")
     * @ORM\JoinTable(name="stagenumber_has_dancingstyle",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="dancingstyle_id", referencedColumnName="thesaurus_id")
     *   }
     * )
     */
    private $dancingstyle;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Thesaurus", inversedBy="stagenumber_genres")
     * @ORM\JoinTable(name="stagenumber_has_genre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="genre_id", referencedColumnName="thesaurus_id")
     *   }
     * )
     */
    private $genre;


    /**
     * @var string
     *
     * @ORM\Column(name="characters", type="string", length=500,  nullable=true)
     */
    private $characters;

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
     * @var string
     *
     * @ORM\Column(name="setting", type="text", length=1000, nullable=true)
     */
    private $setting;

    /**
     * @var \AppBundle\Entity\Stageshow
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Stageshow", inversedBy="stagenumbers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stageShow_id", referencedColumnName="stageShow_id", nullable=false)
     * })
     */
    private $stageshow;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Thesaurus")
     * @ORM\JoinTable(name="stagenumber_has_costume",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="costume_id", referencedColumnName="thesaurus_id")
     *   }
     * )
     */
    private $costumes;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", mappedBy="stagenumbers")
     */
    private $number;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Song", mappedBy="stagenumbers")
     */
    private $song;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Thesaurus", inversedBy="stagenumber")
     * @ORM\JoinTable(name="stagenumber_has_dancemble",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="dancemble_id", referencedColumnName="thesaurus_id")
     *   }
     * )
     */
    private $dancemble;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Thesaurus", inversedBy="stagenumber")
     * @ORM\JoinTable(name="stagenumber_has_musensemble",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="musensemble_id", referencedColumnName="thesaurus_id")
     *   }
     * )
     */
    private $musensemble;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Person", inversedBy="performersStagenumber")
     * @ORM\JoinTable(name="stagenumber_has_performer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="person_id", referencedColumnName="person_id")
     *   }
     * )
     */
    private $performers;

    /** @var  \AppBundle\Entity\Thesaurus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Thesaurus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cast_id", referencedColumnName="thesaurus_id")
     * })
     */
    private $cast;

    /**
     * @var boolean
     *
     * @ORM\Column(name="selected", type="boolean", nullable=true)
     */
    private $selected;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=500, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\Column(name="last_update", type="datetime")
     */
    private $last_update;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinTable(name="stagenumber_has_editor",
     *   joinColumns={
     *     @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="editors", referencedColumnName="id")
     *   }
     * )
     */
    private $editors;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->number = new \Doctrine\Common\Collections\ArrayCollection();
        $this->song = new \Doctrine\Common\Collections\ArrayCollection();
        $this->editors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->date_creation = new \DateTime();
        $this->last_update = new \DateTime();
    }

    /**
     * @return int
     */
    public function getStagenumberId()
    {
        return $this->stagenumberId;
    }

    /**
     * @param int $stagenumberId
     */
    public function setStagenumberId($stagenumberId)
    {
        $this->stagenumberId = $stagenumberId;
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

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMusensemble()
    {
        return $this->musensemble;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $musensemble
     */
    public function setMusensemble($musensemble)
    {
        $this->musensemble = $musensemble;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDancemble()
    {
        return $this->dancemble;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $dancemble
     */
    public function setDancemble($dancemble)
    {
        $this->dancemble = $dancemble;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMusicals()
    {
        return $this->musicals;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $musicals
     */
    public function setMusicals($musicals)
    {
        $this->musicals = $musicals;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDancingstyle()
    {
        return $this->dancingstyle;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $dancingstyle
     */
    public function setDancingstyle($dancingstyle)
    {
        $this->dancingstyle = $dancingstyle;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return string
     */
    public function getCharacters()
    {
        return $this->characters;
    }

    /**
     * @param string $characters
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @param mixed $date_creation
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @return mixed
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     * @param mixed $last_update
     */
    public function setLastUpdate($last_update)
    {
        $this->last_update = $last_update;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerformers()
    {
        return $this->performers;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $performers
     */
    public function setPerformers($performers)
    {
        $this->performers = $performers;
    }

    /**
     * @return Thesaurus
     */
    public function getCast()
    {
        return $this->cast;
    }

    /**
     * @param Thesaurus $cast
     */
    public function setCast($cast)
    {
        $this->cast = $cast;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return bool
     */
    public function isSelected()
    {
        return $this->selected;
    }

    /**
     * @param bool $selected
     */
    public function setSelected($selected)
    {
        $this->selected = $selected;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCostumes()
    {
        return $this->costumes;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $costumes
     */
    public function setCostumes($costumes)
    {
        $this->costumes = $costumes;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEditors()
    {
        return $this->editors;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $editors
     */
    public function setEditors($editors)
    {
        $this->editors = $editors;
    }


    public function __toString()
    {
        return $this->getTitle();
    }

}
