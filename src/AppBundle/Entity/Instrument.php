<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instrument
 *
 * @ORM\Table(name="instrument")
 * @ORM\Entity
 */
class Instrument
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="playing_range", type="string", length=10, nullable=true)
     */
    private $playingRange;

    /**
     * @var string
     *
     * @ORM\Column(name="additional_info", type="string", length=400, nullable=true)
     */
    private $additionalInfo;

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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Instrumentation", mappedBy="instrument")
     */
    private $instrumentation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->instrumentation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Parse as string
     */
    public function __toString() {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Instrument
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set playingRange
     *
     * @param string $playingRange
     *
     * @return Instrument
     */
    public function setPlayingRange($playingRange)
    {
        $this->playingRange = $playingRange;

        return $this;
    }

    /**
     * Get playingRange
     *
     * @return string
     */
    public function getPlayingRange()
    {
        return $this->playingRange;
    }

    /**
     * Set additionalInfo
     *
     * @param string $additionalInfo
     *
     * @return Instrument
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;

        return $this;
    }

    /**
     * Get additionalInfo
     *
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
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
     * Add instrumentation
     *
     * @param \AppBundle\Entity\Instrumentation $instrumentation
     *
     * @return Instrument
     */
    public function addInstrumentation(\AppBundle\Entity\Instrumentation $instrumentation)
    {
        $this->instrumentation[] = $instrumentation;

        return $this;
    }

    /**
     * Remove instrumentation
     *
     * @param \AppBundle\Entity\Instrumentation $instrumentation
     */
    public function removeInstrumentation(\AppBundle\Entity\Instrumentation $instrumentation)
    {
        $this->instrumentation->removeElement($instrumentation);
    }

    /**
     * Get instrumentation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInstrumentation()
    {
        return $this->instrumentation;
    }
}
