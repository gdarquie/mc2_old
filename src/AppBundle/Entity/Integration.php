<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Integration
 *
 * @ORM\Table(name="integration")
 * @ORM\Entity
 */
class Integration
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="integration_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $integrationId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", inversedBy="integration")
     * @ORM\JoinTable(name="integration_has_number",
     *   joinColumns={
     *     @ORM\JoinColumn(name="integration_id", referencedColumnName="integration_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
     *   }
     * )
     */
    private $number;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->number = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Integration
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get integrationId
     *
     * @return integer
     */
    public function getIntegrationId()
    {
        return $this->integrationId;
    }

    /**
     * Add number
     *
     * @param \AppBundle\Entity\Number $number
     *
     * @return Integration
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
