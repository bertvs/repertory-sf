<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collection
 *
 * @ORM\Table(name="collection", indexes={@ORM\Index(name="Collection-Musical_Form", columns={"musical_form_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CollectionRepository")
 */
class Collection
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=400, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\MusicalForm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MusicalForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="musical_form_id", referencedColumnName="id")
     * })
     */
    private $musicalForm;

    /**
     * Parse as string
     */
    public function __toString() {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Collection
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
     * Set description
     *
     * @param string $description
     *
     * @return Collection
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set musicalForm
     *
     * @param \AppBundle\Entity\MusicalForm $musicalForm
     *
     * @return Collection
     */
    public function setMusicalForm(\AppBundle\Entity\MusicalForm $musicalForm = null)
    {
        $this->musicalForm = $musicalForm;

        return $this;
    }

    /**
     * Get musicalForm
     *
     * @return \AppBundle\Entity\MusicalForm
     */
    public function getMusicalForm()
    {
        return $this->musicalForm;
    }
}
