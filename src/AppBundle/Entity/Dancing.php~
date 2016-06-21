<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dancing
 *
 * @ORM\Table(name="dancing")
 * @ORM\Entity
 */
class Dancing
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="mandatory", type="string", length=45, nullable=true)
     */
    private $mandatory;

    /**
     * @var integer
     *
     * @ORM\Column(name="dancing_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dancingId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Stagenumber", inversedBy="dancing")
     * @ORM\JoinTable(name="dancing_has_stagenumber",
     *   joinColumns={
     *     @ORM\JoinColumn(name="dancing_id", referencedColumnName="dancing_id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", inversedBy="dancing")
     * @ORM\JoinTable(name="dancing_has_number",
     *   joinColumns={
     *     @ORM\JoinColumn(name="dancing_id", referencedColumnName="dancing_id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tv", inversedBy="dancing")
     * @ORM\JoinTable(name="tv_has_dancing",
     *   joinColumns={
     *     @ORM\JoinColumn(name="dancing_id", referencedColumnName="dancing_id")
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
        $this->number = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tv = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Dancing
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
     * @return Dancing
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
     * Set mandatory
     *
     * @param string $mandatory
     *
     * @return Dancing
     */
    public function setMandatory($mandatory)
    {
        $this->mandatory = $mandatory;

        return $this;
    }

    /**
     * Get mandatory
     *
     * @return string
     */
    public function getMandatory()
    {
        return $this->mandatory;
    }

    /**
     * Get dancingId
     *
     * @return integer
     */
    public function getDancingId()
    {
        return $this->dancingId;
    }

    /**
     * Add stagenumber
     *
     * @param \AppBundle\Entity\Stagenumber $stagenumber
     *
     * @return Dancing
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
     * Add number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return Dancing
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
     * Add tv
     *
     * @param \AppBundle\Entity\Tv $tv
     *
     * @return Dancing
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
