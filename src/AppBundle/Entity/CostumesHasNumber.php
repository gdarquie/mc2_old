<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CostumesHasNumber
 *
 * @ORM\Table(name="costumes_has_number", indexes={@ORM\Index(name="IDX_C3953BECD80B7637", columns={"costumes_id"}), @ORM\Index(name="IDX_C3953BEC30A1DE10", columns={"number_id"})})
 * @ORM\Entity
 */
class CostumesHasNumber
{
    /**
     * @var integer
     *
     * @ORM\Column(name="costumes_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $costumesId;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numberId;



    /**
     * Set costumesId
     *
     * @param integer $costumesId
     *
     * @return CostumesHasNumber
     */
    public function setCostumesId($costumesId)
    {
        $this->costumesId = $costumesId;

        return $this;
    }

    /**
     * Get costumesId
     *
     * @return integer
     */
    public function getCostumesId()
    {
        return $this->costumesId;
    }

    /**
     * Set numberId
     *
     * @param integer $numberId
     *
     * @return CostumesHasNumber
     */
    public function setNumberId($numberId)
    {
        $this->numberId = $numberId;

        return $this;
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
}
