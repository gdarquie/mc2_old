<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Underscoring
 *
 * @ORM\Table(name="underscoring")
 * @ORM\Entity
 */
class Underscoring
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
     * @ORM\Column(name="timecode", type="integer", nullable=true)
     */
    private $timecode;

    /**
     * @var integer
     *
     * @ORM\Column(name="underscoring_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $underscoringId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Film", mappedBy="underscoring")
     */
    private $film;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->film = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Underscoring
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
     * Set timecode
     *
     * @param integer $timecode
     *
     * @return Underscoring
     */
    public function setTimecode($timecode)
    {
        $this->timecode = $timecode;

        return $this;
    }

    /**
     * Get timecode
     *
     * @return integer
     */
    public function getTimecode()
    {
        return $this->timecode;
    }

    /**
     * Get underscoringId
     *
     * @return integer
     */
    public function getUnderscoringId()
    {
        return $this->underscoringId;
    }

    /**
     * Add film
     *
     * @param \AppBundle\Entity\Film $film
     *
     * @return Underscoring
     */
    public function addFilm(\AppBundle\Entity\Film $film)
    {
        $this->film[] = $film;

        return $this;
    }

    /**
     * Remove film
     *
     * @param \AppBundle\Entity\Film $film
     */
    public function removeFilm(\AppBundle\Entity\Film $film)
    {
        $this->film->removeElement($film);
    }

    /**
     * Get film
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilm()
    {
        return $this->film;
    }
}
