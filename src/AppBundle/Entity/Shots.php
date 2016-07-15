<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shots
 *
 * @ORM\Table(name="shots")
 * @ORM\Entity
 */
class Shots
{
    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="validation_id", type="integer", nullable=false)
     */
    private $validationId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="shots_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $shotsId;



    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Shots
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set validationId
     *
     * @param integer $validationId
     *
     * @return Shots
     */
    public function setValidationId($validationId)
    {
        $this->validationId = $validationId;

        return $this;
    }

    /**
     * Get validationId
     *
     * @return integer
     */
    public function getValidationId()
    {
        return $this->validationId;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return Shots
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Get shotsId
     *
     * @return integer
     */
    public function getShotsId()
    {
        return $this->shotsId;
    }
}
