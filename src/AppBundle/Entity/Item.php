<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item", uniqueConstraints={@ORM\UniqueConstraint(name="structure_2", columns={"structure"})}, indexes={@ORM\Index(name="structure", columns={"structure"}), @ORM\Index(name="fk_item_Thesaurus", columns={"thesaurus_id"})})
 * @ORM\Entity
 */
class Item
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="validation_id", type="integer", nullable=false)
     */
    private $validationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $itemId;

    /**
     * @var \AppBundle\Entity\Thesaurus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Thesaurus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="thesaurus_id", referencedColumnName="thesaurus_id")
     * })
     */
    private $thesaurus;

    /**
     * @var \AppBundle\Entity\Number
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Number")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="structure", referencedColumnName="number_id")
     * })
     */
    private $structure;



    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return Item
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
     * Set validationId
     *
     * @param integer $validationId
     *
     * @return Item
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
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set thesaurus
     *
     * @param \AppBundle\Entity\Thesaurus $thesaurus
     *
     * @return Item
     */
    public function setThesaurus(\AppBundle\Entity\Thesaurus $thesaurus = null)
    {
        $this->thesaurus = $thesaurus;

        return $this;
    }

    /**
     * Get thesaurus
     *
     * @return \AppBundle\Entity\Thesaurus
     */
    public function getThesaurus()
    {
        return $this->thesaurus;
    }

    /**
     * Set structure
     *
     * @param \AppBundle\Entity\Number $structure
     *
     * @return Item
     */
    public function setStructure(\AppBundle\Entity\Number $structure = null)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure
     *
     * @return \AppBundle\Entity\Number
     */
    public function getStructure()
    {
        return $this->structure;
    }
}
