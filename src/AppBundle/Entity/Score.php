<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Score
 *
 * @ORM\Table(name="score")
 * @ORM\Entity
 */
class Score
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="book_title", type="string", length=50, nullable=true)
     */
    private $bookTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=400, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="editor", type="string", length=50, nullable=true)
     */
    private $editor;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=50, nullable=true)
     */
    private $publisher;

    /**
     * @var integer
     *
     * @ORM\Column(name="publishing_year", type="integer", nullable=true)
     */
    private $publishingYear;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Parse as string
     */
    public function __toString() {
        return $this->bookTitle ? $this->bookTitle : "";
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Score
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
     * Set bookTitle
     *
     * @param string $bookTitle
     *
     * @return Score
     */
    public function setBookTitle($bookTitle)
    {
        $this->bookTitle = $bookTitle;

        return $this;
    }

    /**
     * Get bookTitle
     *
     * @return string
     */
    public function getBookTitle()
    {
        return $this->bookTitle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Score
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set editor
     *
     * @param string $editor
     *
     * @return Score
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor
     *
     * @return string
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set publisher
     *
     * @param string $publisher
     *
     * @return Score
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set publishingYear
     *
     * @param integer $publishingYear
     *
     * @return Score
     */
    public function setPublishingYear($publishingYear)
    {
        $this->publishingYear = $publishingYear;

        return $this;
    }

    /**
     * Get publishingYear
     *
     * @return integer
     */
    public function getPublishingYear()
    {
        return $this->publishingYear;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
