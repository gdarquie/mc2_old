<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 */
class Film
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="productionyear", type="integer", nullable=true)
     */
    private $productionyear;

    /**
     * @var integer
     *
     * @ORM\Column(name="released", type="integer", nullable=true)
     */
    private $released;

    /**
     * @var string
     *
     * @ORM\Column(name="id_imdb", type="string", length=255, nullable=true)
     */
    private $idImdb;

    /**
     * @var string
     *
     * @ORM\Column(name="studio", type="string", length=255, nullable=true)
     */
    private $studio;

    /**
     * @var string
     *
     * @ORM\Column(name="distributor", type="string", length=255, nullable=true)
     */
    private $distributor;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="ratio", type="string", length=255, nullable=true)
     */
    private $ratio;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="contract", type="string", length=255, nullable=true)
     */
    private $contract;

    /**
     * @var integer
     *
     * @ORM\Column(name="rights", type="integer", nullable=true)
     */
    private $rights;

    /**
     * @var integer
     *
     * @ORM\Column(name="negative", type="integer", nullable=true)
     */
    private $negative;

    /**
     * @var integer
     *
     * @ORM\Column(name="pna", type="integer", nullable=true)
     */
    private $pna;

    /**
     * @var integer
     *
     * @ORM\Column(name="us_rentals", type="integer", nullable=true)
     */
    private $usRentals;

    /**
     * @var integer
     *
     * @ORM\Column(name="foreign_rentals", type="integer", nullable=true)
     */
    private $foreignRentals;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_rentals", type="integer", nullable=true)
     */
    private $totalRentals;

    /**
     * @var integer
     *
     * @ORM\Column(name="us_boxoffice", type="integer", nullable=true)
     */
    private $usBoxoffice;

    /**
     * @var integer
     *
     * @ORM\Column(name="foreign_boxoffice", type="integer", nullable=true)
     */
    private $foreignBoxoffice;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_boxoffice", type="integer", nullable=true)
     */
    private $totalBoxoffice;

    /**
     * @var string
     *
     * @ORM\Column(name="source_eco", type="text", length=65535, nullable=true)
     */
    private $sourceEco;

    /**
     * @var string
     *
     * @ORM\Column(name="archives", type="text", length=16777215, nullable=true)
     */
    private $archives;

    /**
     * @var string
     *
     * @ORM\Column(name="deleted", type="text", length=16777215, nullable=true)
     */
    private $deleted;

    /**
     * @var string
     *
     * @ORM\Column(name="adaptation", type="string", length=255, nullable=true)
     */
    private $adaptation;

    /**
     * @var string
     *
     * @ORM\Column(name="remake", type="string", length=45, nullable=true)
     */
    private $remake;

    /**
     * @var integer
     *
     * @ORM\Column(name="song", type="integer", nullable=true)
     */
    private $song;

    /**
     * @var string
     *
     * @ORM\Column(name="verdict", type="string", length=255, nullable=true)
     */
    private $verdict;

    /**
     * @var string
     *
     * @ORM\Column(name="pca_texte", type="text", length=16777215, nullable=true)
     */
    private $pcaTexte;

    /**
     * @var string
     *
     * @ORM\Column(name="legion", type="string", length=5, nullable=true)
     */
    private $legion;

    /**
     * @var string
     *
     * @ORM\Column(name="protestant", type="string", length=255, nullable=true)
     */
    private $protestant;

    /**
     * @var string
     *
     * @ORM\Column(name="harrisson", type="string", length=255, nullable=true)
     */
    private $harrisson;

    /**
     * @var string
     *
     * @ORM\Column(name="bord", type="string", length=255, nullable=true)
     */
    private $bord;

    /**
     * @var integer
     *
     * @ORM\Column(name="film_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $filmId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Underscoring", inversedBy="film")
     * @ORM\JoinTable(name="film_has_underscoring",
     *   joinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="underscoring_id", referencedColumnName="underscoring_id")
     *   }
     * )
     */
    private $underscoring;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\State", inversedBy="film")
     * @ORM\JoinTable(name="film_has_state",
     *   joinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="state_id", referencedColumnName="state_id")
     *   }
     * )
     */
    private $state;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Censorship", inversedBy="film")
     * @ORM\JoinTable(name="film_has_censorship",
     *   joinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="censorship_id", referencedColumnName="censorship_id")
     *   }
     * )
     */
    private $censorship;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Person", inversedBy="filmDirector")
     * @ORM\JoinTable(name="film_has_director",
     *   joinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="person_id", referencedColumnName="person_id")
     *   }
     * )
     */
    private $directors;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Person", inversedBy="filmProducer")
     * @ORM\JoinTable(name="film_has_producer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="person_id", referencedColumnName="person_id")
     *   }
     * )
     */
    private $producers;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isComplete = false;

    /**
     * @ORM\OneToMany(targetEntity="Number", mappedBy="film")
     */
    private $numbers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->underscoring = new \Doctrine\Common\Collections\ArrayCollection();
        $this->state = new \Doctrine\Common\Collections\ArrayCollection();
        $this->censorship = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numbers = new ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Film
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
     * Set productionyear
     *
     * @param integer $productionyear
     *
     * @return Film
     */
    public function setProductionyear($productionyear)
    {
        $this->productionyear = $productionyear;

        return $this;
    }

    /**
     * Get productionyear
     *
     * @return integer
     */
    public function getProductionyear()
    {
        return $this->productionyear;
    }

    /**
     * Set released
     *
     * @param integer $released
     *
     * @return Film
     */
    public function setReleased($released)
    {
        $this->released = $released;

        return $this;
    }

    /**
     * Get released
     *
     * @return integer
     */
    public function getReleased()
    {
        return $this->released;
    }

    /**
     * Set idImdb
     *
     * @param string $idImdb
     *
     * @return Film
     */
    public function setIdImdb($idImdb)
    {
        $this->idImdb = $idImdb;

        return $this;
    }

    /**
     * Get idImdb
     *
     * @return string
     */
    public function getIdImdb()
    {
        return $this->idImdb;
    }

    /**
     * Set studio
     *
     * @param string $studio
     *
     * @return Film
     */
    public function setStudio($studio)
    {
        $this->studio = $studio;

        return $this;
    }

    /**
     * Get studio
     *
     * @return string
     */
    public function getStudio()
    {
        return $this->studio;
    }

    /**
     * Set distributor
     *
     * @param string $distributor
     *
     * @return Film
     */
    public function setDistributor($distributor)
    {
        $this->distributor = $distributor;

        return $this;
    }

    /**
     * Get distributor
     *
     * @return string
     */
    public function getDistributor()
    {
        return $this->distributor;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Film
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set ratio
     *
     * @param string $ratio
     *
     * @return Film
     */
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;

        return $this;
    }

    /**
     * Get ratio
     *
     * @return string
     */
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * Set length
     *
     * @param integer $length
     *
     * @return Film
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set contract
     *
     * @param string $contract
     *
     * @return Film
     */
    public function setContract($contract)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get contract
     *
     * @return string
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set rights
     *
     * @param integer $rights
     *
     * @return Film
     */
    public function setRights($rights)
    {
        $this->rights = $rights;

        return $this;
    }

    /**
     * Get rights
     *
     * @return integer
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * Set negative
     *
     * @param integer $negative
     *
     * @return Film
     */
    public function setNegative($negative)
    {
        $this->negative = $negative;

        return $this;
    }

    /**
     * Get negative
     *
     * @return integer
     */
    public function getNegative()
    {
        return $this->negative;
    }

    /**
     * Set pna
     *
     * @param integer $pna
     *
     * @return Film
     */
    public function setPna($pna)
    {
        $this->pna = $pna;

        return $this;
    }

    /**
     * Get pna
     *
     * @return integer
     */
    public function getPna()
    {
        return $this->pna;
    }

    /**
     * Set usRentals
     *
     * @param integer $usRentals
     *
     * @return Film
     */
    public function setUsRentals($usRentals)
    {
        $this->usRentals = $usRentals;

        return $this;
    }

    /**
     * Get usRentals
     *
     * @return integer
     */
    public function getUsRentals()
    {
        return $this->usRentals;
    }

    /**
     * Set foreignRentals
     *
     * @param integer $foreignRentals
     *
     * @return Film
     */
    public function setForeignRentals($foreignRentals)
    {
        $this->foreignRentals = $foreignRentals;

        return $this;
    }

    /**
     * Get foreignRentals
     *
     * @return integer
     */
    public function getForeignRentals()
    {
        return $this->foreignRentals;
    }

    /**
     * Set totalRentals
     *
     * @param integer $totalRentals
     *
     * @return Film
     */
    public function setTotalRentals($totalRentals)
    {
        $this->totalRentals = $totalRentals;

        return $this;
    }

    /**
     * Get totalRentals
     *
     * @return integer
     */
    public function getTotalRentals()
    {
        return $this->totalRentals;
    }

    /**
     * Set usBoxoffice
     *
     * @param integer $usBoxoffice
     *
     * @return Film
     */
    public function setUsBoxoffice($usBoxoffice)
    {
        $this->usBoxoffice = $usBoxoffice;

        return $this;
    }

    /**
     * Get usBoxoffice
     *
     * @return integer
     */
    public function getUsBoxoffice()
    {
        return $this->usBoxoffice;
    }

    /**
     * Set foreignBoxoffice
     *
     * @param integer $foreignBoxoffice
     *
     * @return Film
     */
    public function setForeignBoxoffice($foreignBoxoffice)
    {
        $this->foreignBoxoffice = $foreignBoxoffice;

        return $this;
    }

    /**
     * Get foreignBoxoffice
     *
     * @return integer
     */
    public function getForeignBoxoffice()
    {
        return $this->foreignBoxoffice;
    }

    /**
     * Set totalBoxoffice
     *
     * @param integer $totalBoxoffice
     *
     * @return Film
     */
    public function setTotalBoxoffice($totalBoxoffice)
    {
        $this->totalBoxoffice = $totalBoxoffice;

        return $this;
    }

    /**
     * Get totalBoxoffice
     *
     * @return integer
     */
    public function getTotalBoxoffice()
    {
        return $this->totalBoxoffice;
    }

    /**
     * Set sourceEco
     *
     * @param string $sourceEco
     *
     * @return Film
     */
    public function setSourceEco($sourceEco)
    {
        $this->sourceEco = $sourceEco;

        return $this;
    }

    /**
     * Get sourceEco
     *
     * @return string
     */
    public function getSourceEco()
    {
        return $this->sourceEco;
    }

    /**
     * Set archives
     *
     * @param string $archives
     *
     * @return Film
     */
    public function setArchives($archives)
    {
        $this->archives = $archives;

        return $this;
    }

    /**
     * Get archives
     *
     * @return string
     */
    public function getArchives()
    {
        return $this->archives;
    }

    /**
     * Set deleted
     *
     * @param string $deleted
     *
     * @return Film
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return string
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set adaptation
     *
     * @param string $adaptation
     *
     * @return Film
     */
    public function setAdaptation($adaptation)
    {
        $this->adaptation = $adaptation;

        return $this;
    }

    /**
     * Get adaptation
     *
     * @return string
     */
    public function getAdaptation()
    {
        return $this->adaptation;
    }

    /**
     * Set remake
     *
     * @param string $remake
     *
     * @return Film
     */
    public function setRemake($remake)
    {
        $this->remake = $remake;

        return $this;
    }

    /**
     * Get remake
     *
     * @return string
     */
    public function getRemake()
    {
        return $this->remake;
    }

    /**
     * Set song
     *
     * @param integer $song
     *
     * @return Film
     */
    public function setSong($song)
    {
        $this->song = $song;

        return $this;
    }

    /**
     * Get song
     *
     * @return integer
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Set verdict
     *
     * @param string $verdict
     *
     * @return Film
     */
    public function setVerdict($verdict)
    {
        $this->verdict = $verdict;

        return $this;
    }

    /**
     * Get verdict
     *
     * @return string
     */
    public function getVerdict()
    {
        return $this->verdict;
    }

    /**
     * Set pcaTexte
     *
     * @param string $pcaTexte
     *
     * @return Film
     */
    public function setPcaTexte($pcaTexte)
    {
        $this->pcaTexte = $pcaTexte;

        return $this;
    }

    /**
     * Get pcaTexte
     *
     * @return string
     */
    public function getPcaTexte()
    {
        return $this->pcaTexte;
    }

    /**
     * Set legion
     *
     * @param string $legion
     *
     * @return Film
     */
    public function setLegion($legion)
    {
        $this->legion = $legion;

        return $this;
    }

    /**
     * Get legion
     *
     * @return string
     */
    public function getLegion()
    {
        return $this->legion;
    }

    /**
     * Set protestant
     *
     * @param string $protestant
     *
     * @return Film
     */
    public function setProtestant($protestant)
    {
        $this->protestant = $protestant;

        return $this;
    }

    /**
     * Get protestant
     *
     * @return string
     */
    public function getProtestant()
    {
        return $this->protestant;
    }

    /**
     * Set harrisson
     *
     * @param string $harrisson
     *
     * @return Film
     */
    public function setHarrisson($harrisson)
    {
        $this->harrisson = $harrisson;

        return $this;
    }

    /**
     * Get harrisson
     *
     * @return string
     */
    public function getHarrisson()
    {
        return $this->harrisson;
    }

    /**
     * Set bord
     *
     * @param string $bord
     *
     * @return Film
     */
    public function setBord($bord)
    {
        $this->bord = $bord;

        return $this;
    }

    /**
     * Get bord
     *
     * @return string
     */
    public function getBord()
    {
        return $this->bord;
    }

    /**
     * Get filmId
     *
     * @return integer
     */
    public function getFilmId()
    {
        return $this->filmId;
    }

    /**
     * Add underscoring
     *
     * @param \AppBundle\Entity\Underscoring $underscoring
     *
     * @return Film
     */
    public function addUnderscoring(\AppBundle\Entity\Underscoring $underscoring)
    {
        $this->underscoring[] = $underscoring;

        return $this;
    }

    /**
     * Remove underscoring
     *
     * @param \AppBundle\Entity\Underscoring $underscoring
     */
    public function removeUnderscoring(\AppBundle\Entity\Underscoring $underscoring)
    {
        $this->underscoring->removeElement($underscoring);
    }

    /**
     * Get underscoring
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnderscoring()
    {
        return $this->underscoring;
    }

    /**
     * Add state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return Film
     */
    public function addState(\AppBundle\Entity\State $state)
    {
        $this->state[] = $state;

        return $this;
    }

    /**
     * Remove state
     *
     * @param \AppBundle\Entity\State $state
     */
    public function removeState(\AppBundle\Entity\State $state)
    {
        $this->state->removeElement($state);
    }

    /**
     * Get state
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Add censorship
     *
     * @param \AppBundle\Entity\Censorship $censorship
     *
     * @return Film
     */
    public function addCensorship(\AppBundle\Entity\Censorship $censorship)
    {
        $this->censorship[] = $censorship;

        return $this;
    }

    /**
     * Remove censorship
     *
     * @param \AppBundle\Entity\Censorship $censorship
     */
    public function removeCensorship(\AppBundle\Entity\Censorship $censorship)
    {
        $this->censorship->removeElement($censorship);
    }

    /**
     * Get censorship
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCensorship()
    {
        return $this->censorship;
    }

    /**
     * @return mixed
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * @param mixed $directors
     */
    public function setDirectors($directors)
    {
        $this->directors = $directors;
    }

    /**
     * @return mixed
     */
    public function getIsComplete()
    {
        return $this->isComplete;
    }

    /**
     * @param mixed $isComplete
     */
    public function setIsComplete($isComplete)
    {
        $this->isComplete = $isComplete;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducers()
    {
        return $this->producers;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $producers
     */
    public function setProducers($producers)
    {
        $this->producers = $producers;
    }

    /**
     * @return mixed
     */
    public function getNumbers()
    {
        return $this->numbers;
    }

    /**
     * @param mixed $numbers
     */
    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;
    }


    public function __toString()
    {
        return $this->getTitle();
    }
}
