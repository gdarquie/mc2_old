<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thesaurus
 *
 * @ORM\Table(name="thesaurus")
 * @ORM\Entity
 */
class Thesaurus
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=500, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="definition", type="text", length=65535, nullable=true)
     */
    private $definition;

    /**
     * @var string
     *
     * @ORM\Column(name="example", type="text", length=65535, nullable=true)
     */
    private $example;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=500, nullable=true)
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="thesaurus_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $thesaurusId;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Thesaurus
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
     * @return Thesaurus
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Thesaurus
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Thesaurus
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set definition
     *
     * @param string $definition
     *
     * @return Thesaurus
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return string
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Set example
     *
     * @param string $example
     *
     * @return Thesaurus
     */
    public function setExample($example)
    {
        $this->example = $example;

        return $this;
    }

    /**
     * Get example
     *
     * @return string
     */
    public function getExample()
    {
        return $this->example;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Thesaurus
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get thesaurusId
     *
     * @return integer
     */
    public function getThesaurusId()
    {
        return $this->thesaurusId;
    }
}
