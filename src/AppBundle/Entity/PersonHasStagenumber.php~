<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonHasStagenumber
 *
 * @ORM\Table(name="person_has_stageNumber", indexes={@ORM\Index(name="fk_person_has_stageNumber_stageNumber1_idx", columns={"stageNumber_id"}), @ORM\Index(name="fk_person_has_stageNumber_person1_idx", columns={"person_id"}), @ORM\Index(name="fk_person_has_stageNumber_profession1_idx", columns={"profession_id"})})
 * @ORM\Entity
 */
class PersonHasStagenumber
{
    /**
     * @var \AppBundle\Entity\Stagenumber
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Stagenumber")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stageNumber_id", referencedColumnName="stageNumber_id")
     * })
     */
    private $stagenumber;

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
     * Set stagenumber
     *
     * @param \AppBundle\Entity\Stagenumber $stagenumber
     *
     * @return PersonHasStagenumber
     */
    public function setStagenumber(\AppBundle\Entity\Stagenumber $stagenumber)
    {
        $this->stagenumber = $stagenumber;

        return $this;
    }

    /**
     * Get stagenumber
     *
     * @return \AppBundle\Entity\Stagenumber
     */
    public function getStagenumber()
    {
        return $this->stagenumber;
    }

    /**
     * Set profession
     *
     * @param \AppBundle\Entity\Profession $profession
     *
     * @return PersonHasStagenumber
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
     * @return PersonHasStagenumber
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
