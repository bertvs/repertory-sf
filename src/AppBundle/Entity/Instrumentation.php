<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instrumentation
 *
 * @ORM\Table(name="instrumentation")
 * @ORM\Entity
 */
class Instrumentation
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="conducted", type="boolean", nullable=false)
     */
    private $conducted;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=5)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Instrument", inversedBy="instrumentation")
     * @ORM\JoinTable(name="includes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="instrumentation_code", referencedColumnName="code")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="instrument_code", referencedColumnName="code")
     *   }
     * )
     */
    private $instrument;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->instrument = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Parse as string
     */
    public function __toString() {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Instrumentation
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
     * Set type
     *
     * @param string $type
     *
     * @return Instrumentation
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
     * Set conducted
     *
     * @param boolean $conducted
     *
     * @return Instrumentation
     */
    public function setConducted($conducted)
    {
        $this->conducted = $conducted;

        return $this;
    }

    /**
     * Get conducted
     *
     * @return boolean
     */
    public function getConducted()
    {
        return $this->conducted;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add instrument
     *
     * @param \AppBundle\Entity\Instrument $instrument
     *
     * @return Instrumentation
     */
    public function addInstrument(\AppBundle\Entity\Instrument $instrument)
    {
        $this->instrument[] = $instrument;

        return $this;
    }

    /**
     * Remove instrument
     *
     * @param \AppBundle\Entity\Instrument $instrument
     */
    public function removeInstrument(\AppBundle\Entity\Instrument $instrument)
    {
        $this->instrument->removeElement($instrument);
    }

    /**
     * Get instrument
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInstrument()
    {
        return $this->instrument;
    }
}
