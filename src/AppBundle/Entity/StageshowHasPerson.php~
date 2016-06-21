<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StageshowHasPerson
 *
 * @ORM\Table(name="stageShow_has_person", indexes={@ORM\Index(name="fk_stageShow_has_person_person1_idx", columns={"person_id"}), @ORM\Index(name="fk_stageShow_has_person_stageShow1_idx", columns={"stageShow_id"}), @ORM\Index(name="fk_stageShow_has_person_profession1_idx", columns={"profession_id"})})
 * @ORM\Entity
 */
class StageshowHasPerson
{
    /**
     * @var \AppBundle\Entity\Stageshow
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Stageshow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stageShow_id", referencedColumnName="stageShow_id")
     * })
     */
    private $stageshow;

    /**
     * @var \AppBundle\Entity\Profession
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Profession")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profession_id", referencedColumnName="profession_id")
     * })
     */
    private $profession;

    /**
     * @var \AppBundle\Entity\Person
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="person_id")
     * })
     */
    private $person;



    /**
     * Set stageshow
     *
     * @param \AppBundle\Entity\Stageshow $stageshow
     *
     * @return StageshowHasPerson
     */
    public function setStageshow(\AppBundle\Entity\Stageshow $stageshow)
    {
        $this->stageshow = $stageshow;

        return $this;
    }

    /**
     * Get stageshow
     *
     * @return \AppBundle\Entity\Stageshow
     */
    public function getStageshow()
    {
        return $this->stageshow;
    }

    /**
     * Set profession
     *
     * @param \AppBundle\Entity\Profession $profession
     *
     * @return StageshowHasPerson
     */
    public function setProfession(\AppBundle\Entity\Profession $profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return \AppBundle\Entity\Profession
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return StageshowHasPerson
     */
    public function setPerson(\AppBundle\Entity\Person $person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \AppBundle\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }
}
