<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 *
 * @ORM\Table(name="selection")
 * @ORM\Entity()
 */
class Selection{

    /**
     * @var integer
     *
     * @ORM\Column(name="selection_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $selectionId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title = 'untitled';

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Number", inversedBy="selection")
     * @ORM\JoinTable(name="selection_has_number",
     *   joinColumns={
     *     @ORM\JoinColumn(name="selection_id", referencedColumnName="selection_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="number_id", referencedColumnName="number_id")
     *   }
     * )
     */
    private $numbers;

    /**
     * @return int
     */
    public function getSelectionId()
    {
        return $this->selectionId;
    }

    /**
     * @param int $selectionId
     */
    public function setSelectionId($selectionId)
    {
        $this->selectionId = $selectionId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumbers()
    {
        return $this->numbers;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $numbers
     */
    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;
    }



}