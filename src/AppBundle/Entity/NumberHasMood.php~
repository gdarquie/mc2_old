<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NumberHasMood
 *
 * @ORM\Table(name="number_has_mood", indexes={@ORM\Index(name="IDX_DE77805630A1DE10", columns={"number_id"}), @ORM\Index(name="IDX_DE778056B889D33E", columns={"mood_id"})})
 * @ORM\Entity
 */
class NumberHasMood
{
    /**
     * @var integer
     *
     * @ORM\Column(name="number_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numberId;

    /**
     * @var integer
     *
     * @ORM\Column(name="mood_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $moodId;



    /**
     * Set numberId
     *
     * @param integer $numberId
     *
     * @return NumberHasMood
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

    /**
     * Set moodId
     *
     * @param integer $moodId
     *
     * @return NumberHasMood
     */
    public function setMoodId($moodId)
    {
        $this->moodId = $moodId;

        return $this;
    }

    /**
     * Get moodId
     *
     * @return integer
     */
    public function getMoodId()
    {
        return $this->moodId;
    }
}
