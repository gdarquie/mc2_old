<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Number
 *
 * @ORM\Table(name="number", indexes={@ORM\Index(name="fk_number_film1_idx", columns={"film_id"})})
 * @ORM\Entity
 */
class Number
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="begin_tc", type="integer", nullable=true)
     */
    private $beginTc;

    /**
     * @var integer
     *
     * @ORM\Column(name="end_tc", type="integer", nullable=true)
     */
    private $endTc;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="begin", type="string", length=255, nullable=true)
     */
    private $begin;

    /**
     * @var string
     *
     * @ORM\Column(name="ending", type="string", length=255, nullable=true)
     */
    private $ending;

    /**
     * @var string
     *
     * @ORM\Column(name="spectators", type="string", length=255, nullable=true)
     */
    private $spectators;

    /**
     * @var string
     *
     * @ORM\Column(name="musician", type="string", length=255, nullable=true)
     */
    private $musician;

    /**
     * @var string
     *
     * @ORM\Column(name="lyrics", type="text", length=16777215, nullable=true)
     */
    private $lyrics;

    /**
     * @var string
     *
     * @ORM\Column(name="dance", type="string", length=255, nullable=true)
     */
    private $dance;

    /**
     * @var string
     *
     * @ORM\Column(name="tempo", type="string", length=255, nullable=true)
     */
    private $tempo;

    /**
     * @var string
     *
     * @ORM\Column(name="makeUp", type="string", length=255, nullable=true)
     */
    private $makeup;

    /**
     * @var integer
     *
     * @ORM\Column(name="shots", type="integer", nullable=true)
     */
    private $shots;

    /**
     * @var integer
     *
     * @ORM\Column(name="order", type="integer", nullable=true)
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="integration2", type="string", length=255, nullable=true)
     */
    private $integration2;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="string", length=500, nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="structure", type="string", length=255, nullable=true)
     */
    private $structure;

    /**
     * @var string
     *
     * @ORM\Column(name="diegetic", type="string", length=45, nullable=true)
     */
    private $diegetic;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=45, nullable=true)
     */
    private $source;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numberId;

    /**
     * @var \AppBundle\Entity\Film
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     * })
     */
    private $film;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Quotation", inversedBy="numberNumber")
     * @ORM\JoinTable(name="number_has_quotation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="number_number_id", referencedColumnName="number_id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Song", inversedBy="number")
     * @ORM\JoinTable(name="number_has_song",
     *   joinColumns={
     *     @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="song_id", referencedColumnName="song_id")
     *   }
     * )
     */
    private $song;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Place", mappedBy="numberNumber")
     */
    private $place;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Stagenumber", inversedBy="number")
     * @ORM\JoinTable(name="stagenumber_has_number",
     *   joinColumns={
     *     @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Socialplace", inversedBy="numberNumber")
     * @ORM\JoinTable(name="socialplace_has_number",
     *   joinColumns={
     *     @ORM\JoinColumn(name="number_number_id", referencedColumnName="number_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="socialPlace_id", referencedColumnName="socialPlace_id")
     *   }
     * )
     */
    private $socialplace;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Exoticism", inversedBy="numberNumber")
     * @ORM\JoinTable(name="number_has_exoticism",
     *   joinColumns={
     *     @ORM\JoinColumn(name="number_number_id", referencedColumnName="number_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="exoticism_id", referencedColumnName="exoticism_id")
     *   }
     * )
     */
    private $exoticism;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Effects", inversedBy="number")
     * @ORM\JoinTable(name="number_has_effects",
     *   joinColumns={
     *     @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="effects_id", referencedColumnName="effects_id")
     *   }
     * )
     */
    private $effects;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Costumes", mappedBy="number")
     */
    private $costumes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Completeness", mappedBy="number")
     */
    private $completeness;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Dancing", mappedBy="number")
     */
    private $dancing;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Integration", mappedBy="number")
     */
    private $integration;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Musical", mappedBy="number")
     */
    private $musical;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Ensemble", mappedBy="number")
     */
    private $ensemble;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quotation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->song = new \Doctrine\Common\Collections\ArrayCollection();
        $this->place = new \Doctrine\Common\Collections\ArrayCollection();
        $this->stagenumber = new \Doctrine\Common\Collections\ArrayCollection();
        $this->socialplace = new \Doctrine\Common\Collections\ArrayCollection();
        $this->exoticism = new \Doctrine\Common\Collections\ArrayCollection();
        $this->effects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->costumes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->completeness = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dancing = new \Doctrine\Common\Collections\ArrayCollection();
        $this->integration = new \Doctrine\Common\Collections\ArrayCollection();
        $this->musical = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ensemble = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Number
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
     * @return Number
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
     * Set beginTc
     *
     * @param integer $beginTc
     *
     * @return Number
     */
    public function setBeginTc($beginTc)
    {
        $this->beginTc = $beginTc;

        return $this;
    }

    /**
     * Get beginTc
     *
     * @return integer
     */
    public function getBeginTc()
    {
        return $this->beginTc;
    }

    /**
     * Set endTc
     *
     * @param integer $endTc
     *
     * @return Number
     */
    public function setEndTc($endTc)
    {
        $this->endTc = $endTc;

        return $this;
    }

    /**
     * Get endTc
     *
     * @return integer
     */
    public function getEndTc()
    {
        return $this->endTc;
    }

    /**
     * Set length
     *
     * @param integer $length
     *
     * @return Number
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
     * Set begin
     *
     * @param string $begin
     *
     * @return Number
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;

        return $this;
    }

    /**
     * Get begin
     *
     * @return string
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set ending
     *
     * @param string $ending
     *
     * @return Number
     */
    public function setEnding($ending)
    {
        $this->ending = $ending;

        return $this;
    }

    /**
     * Get ending
     *
     * @return string
     */
    public function getEnding()
    {
        return $this->ending;
    }

    /**
     * Set spectators
     *
     * @param string $spectators
     *
     * @return Number
     */
    public function setSpectators($spectators)
    {
        $this->spectators = $spectators;

        return $this;
    }

    /**
     * Get spectators
     *
     * @return string
     */
    public function getSpectators()
    {
        return $this->spectators;
    }

    /**
     * Set musician
     *
     * @param string $musician
     *
     * @return Number
     */
    public function setMusician($musician)
    {
        $this->musician = $musician;

        return $this;
    }

    /**
     * Get musician
     *
     * @return string
     */
    public function getMusician()
    {
        return $this->musician;
    }

    /**
     * Set lyrics
     *
     * @param string $lyrics
     *
     * @return Number
     */
    public function setLyrics($lyrics)
    {
        $this->lyrics = $lyrics;

        return $this;
    }

    /**
     * Get lyrics
     *
     * @return string
     */
    public function getLyrics()
    {
        return $this->lyrics;
    }

    /**
     * Set dance
     *
     * @param string $dance
     *
     * @return Number
     */
    public function setDance($dance)
    {
        $this->dance = $dance;

        return $this;
    }

    /**
     * Get dance
     *
     * @return string
     */
    public function getDance()
    {
        return $this->dance;
    }

    /**
     * Set tempo
     *
     * @param string $tempo
     *
     * @return Number
     */
    public function setTempo($tempo)
    {
        $this->tempo = $tempo;

        return $this;
    }

    /**
     * Get tempo
     *
     * @return string
     */
    public function getTempo()
    {
        return $this->tempo;
    }

    /**
     * Set makeup
     *
     * @param string $makeup
     *
     * @return Number
     */
    public function setMakeup($makeup)
    {
        $this->makeup = $makeup;

        return $this;
    }

    /**
     * Get makeup
     *
     * @return string
     */
    public function getMakeup()
    {
        return $this->makeup;
    }

    /**
     * Set shots
     *
     * @param integer $shots
     *
     * @return Number
     */
    public function setShots($shots)
    {
        $this->shots = $shots;

        return $this;
    }

    /**
     * Get shots
     *
     * @return integer
     */
    public function getShots()
    {
        return $this->shots;
    }

    /**
     * Set order
     *
     * @param integer $order
     *
     * @return Number
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
     * Set integration2
     *
     * @param string $integration2
     *
     * @return Number
     */
    public function setIntegration2($integration2)
    {
        $this->integration2 = $integration2;

        return $this;
    }

    /**
     * Get integration2
     *
     * @return string
     */
    public function getIntegration2()
    {
        return $this->integration2;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return Number
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set structure
     *
     * @param string $structure
     *
     * @return Number
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure
     *
     * @return string
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set diegetic
     *
     * @param string $diegetic
     *
     * @return Number
     */
    public function setDiegetic($diegetic)
    {
        $this->diegetic = $diegetic;

        return $this;
    }

    /**
     * Get diegetic
     *
     * @return string
     */
    public function getDiegetic()
    {
        return $this->diegetic;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Number
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Get numberId
     *
     * @return integer
     */
    public function getNumberId()
    {
        return $this->numberId;
    }

    /**
     * Set film
     *
     * @param \AppBundle\Entity\Film $film
     *
     * @return Number
     */
    public function setFilm(\AppBundle\Entity\Film $film = null)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return \AppBundle\Entity\Film
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Add quotation
     *
     * @param \AppBundle\Entity\Quotation $quotation
     *
     * @return Number
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
     * Add song
     *
     * @param \AppBundle\Entity\Song $song
     *
     * @return Number
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
     * Add place
     *
     * @param \AppBundle\Entity\Place $place
     *
     * @return Number
     */
    public function addPlace(\AppBundle\Entity\Place $place)
    {
        $this->place[] = $place;

        return $this;
    }

    /**
     * Remove place
     *
     * @param \AppBundle\Entity\Place $place
     */
    public function removePlace(\AppBundle\Entity\Place $place)
    {
        $this->place->removeElement($place);
    }

    /**
     * Get place
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Add stagenumber
     *
     * @param \AppBundle\Entity\Stagenumber $stagenumber
     *
     * @return Number
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
     * Add socialplace
     *
     * @param \AppBundle\Entity\Socialplace $socialplace
     *
     * @return Number
     */
    public function addSocialplace(\AppBundle\Entity\Socialplace $socialplace)
    {
        $this->socialplace[] = $socialplace;

        return $this;
    }

    /**
     * Remove socialplace
     *
     * @param \AppBundle\Entity\Socialplace $socialplace
     */
    public function removeSocialplace(\AppBundle\Entity\Socialplace $socialplace)
    {
        $this->socialplace->removeElement($socialplace);
    }

    /**
     * Get socialplace
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocialplace()
    {
        return $this->socialplace;
    }

    /**
     * Add exoticism
     *
     * @param \AppBundle\Entity\Exoticism $exoticism
     *
     * @return Number
     */
    public function addExoticism(\AppBundle\Entity\Exoticism $exoticism)
    {
        $this->exoticism[] = $exoticism;

        return $this;
    }

    /**
     * Remove exoticism
     *
     * @param \AppBundle\Entity\Exoticism $exoticism
     */
    public function removeExoticism(\AppBundle\Entity\Exoticism $exoticism)
    {
        $this->exoticism->removeElement($exoticism);
    }

    /**
     * Get exoticism
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExoticism()
    {
        return $this->exoticism;
    }

    /**
     * Add effect
     *
     * @param \AppBundle\Entity\Effects $effect
     *
     * @return Number
     */
    public function addEffect(\AppBundle\Entity\Effects $effect)
    {
        $this->effects[] = $effect;

        return $this;
    }

    /**
     * Remove effect
     *
     * @param \AppBundle\Entity\Effects $effect
     */
    public function removeEffect(\AppBundle\Entity\Effects $effect)
    {
        $this->effects->removeElement($effect);
    }

    /**
     * Get effects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEffects()
    {
        return $this->effects;
    }

    /**
     * Add costume
     *
     * @param \AppBundle\Entity\Costumes $costume
     *
     * @return Number
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
     * Add completeness
     *
     * @param \AppBundle\Entity\Completeness $completeness
     *
     * @return Number
     */
    public function addCompleteness(\AppBundle\Entity\Completeness $completeness)
    {
        $this->completeness[] = $completeness;

        return $this;
    }

    /**
     * Remove completeness
     *
     * @param \AppBundle\Entity\Completeness $completeness
     */
    public function removeCompleteness(\AppBundle\Entity\Completeness $completeness)
    {
        $this->completeness->removeElement($completeness);
    }

    /**
     * Get completeness
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompleteness()
    {
        return $this->completeness;
    }

    /**
     * Add dancing
     *
     * @param \AppBundle\Entity\Dancing $dancing
     *
     * @return Number
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
     * Add integration
     *
     * @param \AppBundle\Entity\Integration $integration
     *
     * @return Number
     */
    public function addIntegration(\AppBundle\Entity\Integration $integration)
    {
        $this->integration[] = $integration;

        return $this;
    }

    /**
     * Remove integration
     *
     * @param \AppBundle\Entity\Integration $integration
     */
    public function removeIntegration(\AppBundle\Entity\Integration $integration)
    {
        $this->integration->removeElement($integration);
    }

    /**
     * Get integration
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntegration()
    {
        return $this->integration;
    }

    /**
     * Add musical
     *
     * @param \AppBundle\Entity\Musical $musical
     *
     * @return Number
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
     * Add ensemble
     *
     * @param \AppBundle\Entity\Ensemble $ensemble
     *
     * @return Number
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
}
