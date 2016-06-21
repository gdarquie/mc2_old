<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tv
 *
 * @ORM\Table(name="TV")
 * @ORM\Entity
 */
class Tv
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="tv_show", type="string", length=255, nullable=true)
     */
    private $tvShow;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="TV_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tvId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Song", mappedBy="tv")
     */
    private $song;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Musical", mappedBy="tv")
     */
    private $musical;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Dancing", mappedBy="tv")
     */
    private $dancing;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->song = new \Doctrine\Common\Collections\ArrayCollection();
        $this->musical = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dancing = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Tv
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Tv
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
     * Set tvShow
     *
     * @param string $tvShow
     *
     * @return Tv
     */
    public function setTvShow($tvShow)
    {
        $this->tvShow = $tvShow;

        return $this;
    }

    /**
     * Get tvShow
     *
     * @return string
     */
    public function getTvShow()
    {
        return $this->tvShow;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Tv
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
     * Get tvId
     *
     * @return integer
     */
    public function getTvId()
    {
        return $this->tvId;
    }

    /**
     * Add song
     *
     * @param \AppBundle\Entity\Song $song
     *
     * @return Tv
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
     * Add musical
     *
     * @param \AppBundle\Entity\Musical $musical
     *
     * @return Tv
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
     * @return Tv
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
}
