<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity
 */
class Place
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
     * @ORM\Column(name="text", type="text", length=65535, nullable=true)
     */
    private $text;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=true)
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="long", type="float", precision=10, scale=0, nullable=true)
     */
    private $long;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="real", type="string", length=45, nullable=true)
     */
    private $real;

    /**
     * @var string
     *
     * @ORM\Column(name="fiction", type="string", length=45, nullable=true)
     */
    private $fiction;

    /**
     * @var integer
     *
     * @ORM\Column(name="place_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $placeId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", inversedBy="place")
     * @ORM\JoinTable(name="place_has_number",
     *   joinColumns={
     *     @ORM\JoinColumn(name="place_id", referencedColumnName="place_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="number_number_id", referencedColumnName="number_id")
     *   }
     * )
     */
    private $numberNumber;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numberNumber = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Place
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
     * Set text
     *
     * @param string $text
     *
     * @return Place
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Place
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set long
     *
     * @param float $long
     *
     * @return Place
     */
    public function setLong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Get long
     *
     * @return float
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Place
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set real
     *
     * @param string $real
     *
     * @return Place
     */
    public function setReal($real)
    {
        $this->real = $real;

        return $this;
    }

    /**
     * Get real
     *
     * @return string
     */
    public function getReal()
    {
        return $this->real;
    }

    /**
     * Set fiction
     *
     * @param string $fiction
     *
     * @return Place
     */
    public function setFiction($fiction)
    {
        $this->fiction = $fiction;

        return $this;
    }

    /**
     * Get fiction
     *
     * @return string
     */
    public function getFiction()
    {
        return $this->fiction;
    }

    /**
     * Get placeId
     *
     * @return integer
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * Add numberNumber
     *
     * @param \AppBundle\Entity\Number $numberNumber
     *
     * @return Place
     */
    public function addNumberNumber(\AppBundle\Entity\Number $numberNumber)
    {
        $this->numberNumber[] = $numberNumber;

        return $this;
    }

    /**
     * Remove numberNumber
     *
     * @param \AppBundle\Entity\Number $numberNumber
     */
    public function removeNumberNumber(\AppBundle\Entity\Number $numberNumber)
    {
        $this->numberNumber->removeElement($numberNumber);
    }

    /**
     * Get numberNumber
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumberNumber()
    {
        return $this->numberNumber;
    }
}
