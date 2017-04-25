<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Censorship
 *
 * @ORM\Table(name="censorship")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CensorshipRepository")
 */
class Censorship
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="censorship_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $censorshipId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Film", mappedBy="censorship")
     */
    private $film;

    /**
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\Column(name="last_update", type="datetime")
     */
    private $last_update;

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
     * @return Censorship
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
     * Get censorshipId
     *
     * @return integer
     */
    public function getCensorshipId()
    {
        return $this->censorshipId;
    }

    /**
     * Add film
     *
     * @param \AppBundle\Entity\Film $film
     *
     * @return Censorship
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

    public function __toString()
    {
        return $this->getTitle();
    }

}
