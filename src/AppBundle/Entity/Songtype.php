<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Songtype
 *
 * @ORM\Table(name="songType")
 * @ORM\Entity
 */
class Songtype
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
     * @ORM\Column(name="songType_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $songtypeId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Song", mappedBy="songtype")
     */
    private $song;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->song = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Songtype
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
     * Get songtypeId
     *
     * @return integer
     */
    public function getSongtypeId()
    {
        return $this->songtypeId;
    }

    /**
     * Add song
     *
     * @param \AppBundle\Entity\Song $song
     *
     * @return Songtype
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
