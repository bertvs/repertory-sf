<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composition
 *
 * @ORM\Table(name="composition", indexes={@ORM\Index(name="Composition-Composer", columns={"composer_id"}), @ORM\Index(name="Composition-Instrumentation", columns={"instrumentation_code"}), @ORM\Index(name="Composition-Transcriber", columns={"transcriber_id"}), @ORM\Index(name="Composition-Initial_Instrumentation", columns={"initial_instrumentation_code"}), @ORM\Index(name="Composition-Collection", columns={"collection_id"}), @ORM\Index(name="Composition-Musical_Form", columns={"musical_form_id"}), @ORM\Index(name="Composition-Status", columns={"status_id"}), @ORM\Index(name="Composition-Tonality", columns={"tonality_code"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompositionRepository")
 */
class Composition
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
     * @ORM\Column(name="full_title", type="string", length=200, nullable=true)
     */
    private $fullTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="opus", type="string", length=10, nullable=true)
     */
    private $opus;

    /**
     * @var integer
     *
     * @ORM\Column(name="composition_year", type="integer", nullable=false)
     */
    private $compositionYear;

    /**
     * @var integer
     *
     * @ORM\Column(name="collection_position", type="integer", nullable=true)
     */
    private $collectionPosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=true)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=50, nullable=true)
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="additional_info", type="string", length=400, nullable=true)
     */
    private $additionalInfo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="to_be_recorded", type="boolean", nullable=false)
     */
    private $toBeRecorded = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Collection
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Collection")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collection_id", referencedColumnName="id")
     * })
     */
    private $collection;

    /**
     * @var \AppBundle\Entity\Composer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Composer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="composer_id", referencedColumnName="id")
     * })
     */
    private $composer;

    /**
     * @var \AppBundle\Entity\Instrumentation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Instrumentation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="initial_instrumentation_code", referencedColumnName="code")
     * })
     */
    private $initialInstrumentation;

    /**
     * @var \AppBundle\Entity\Instrumentation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Instrumentation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instrumentation_code", referencedColumnName="code")
     * })
     */
    private $instrumentation;

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
     * @var \AppBundle\Entity\Status
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \AppBundle\Entity\Tonality
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tonality")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tonality_code", referencedColumnName="code")
     * })
     */
    private $tonality;

    /**
     * @var \AppBundle\Entity\Composer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Composer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="transcriber_id", referencedColumnName="id")
     * })
     */
    private $transcriber;

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
        return $this->composer . ": " . $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Composition
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
     * Set fullTitle
     *
     * @param string $fullTitle
     *
     * @return Composition
     */
    public function setFullTitle($fullTitle)
    {
        $this->fullTitle = $fullTitle;

        return $this;
    }

    /**
     * Get fullTitle
     *
     * @return string
     */
    public function getFullTitle()
    {
        return $this->fullTitle;
    }

    /**
     * Set opus
     *
     * @param string $opus
     *
     * @return Composition
     */
    public function setOpus($opus)
    {
        $this->opus = $opus;

        return $this;
    }

    /**
     * Get opus
     *
     * @return string
     */
    public function getOpus()
    {
        return $this->opus;
    }

    /**
     * Set compositionYear
     *
     * @param integer $compositionYear
     *
     * @return Composition
     */
    public function setCompositionYear($compositionYear)
    {
        $this->compositionYear = $compositionYear;

        return $this;
    }

    /**
     * Get compositionYear
     *
     * @return integer
     */
    public function getCompositionYear()
    {
        return $this->compositionYear;
    }

    /**
     * Set collectionPosition
     *
     * @param integer $collectionPosition
     *
     * @return Composition
     */
    public function setCollectionPosition($collectionPosition)
    {
        $this->collectionPosition = $collectionPosition;

        return $this;
    }

    /**
     * Get collectionPosition
     *
     * @return integer
     */
    public function getCollectionPosition()
    {
        return $this->collectionPosition;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Composition
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set theme
     *
     * @param string $theme
     *
     * @return Composition
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set additionalInfo
     *
     * @param string $additionalInfo
     *
     * @return Composition
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
     * Set toBeRecorded
     *
     * @param boolean $toBeRecorded
     *
     * @return Composition
     */
    public function setToBeRecorded($toBeRecorded)
    {
        $this->toBeRecorded = $toBeRecorded;

        return $this;
    }

    /**
     * Get toBeRecorded
     *
     * @return boolean
     */
    public function getToBeRecorded()
    {
        return $this->toBeRecorded;
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
     * Set collection
     *
     * @param \AppBundle\Entity\Collection $collection
     *
     * @return Composition
     */
    public function setCollection(\AppBundle\Entity\Collection $collection = null)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return \AppBundle\Entity\Collection
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set composer
     *
     * @param \AppBundle\Entity\Composer $composer
     *
     * @return Composition
     */
    public function setComposer(\AppBundle\Entity\Composer $composer = null)
    {
        $this->composer = $composer;

        return $this;
    }

    /**
     * Get composer
     *
     * @return \AppBundle\Entity\Composer
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * Set initialInstrumentation
     *
     * @param \AppBundle\Entity\Instrumentation $initialInstrumentation
     *
     * @return Composition
     */
    public function setInitialInstrumentation(\AppBundle\Entity\Instrumentation $initialInstrumentation = null)
    {
        $this->initialInstrumentation = $initialInstrumentation;

        return $this;
    }

    /**
     * Get initialInstrumentation
     *
     * @return \AppBundle\Entity\Instrumentation
     */
    public function getInitialInstrumentation()
    {
        return $this->initialInstrumentation;
    }

    /**
     * Set instrumentation
     *
     * @param \AppBundle\Entity\Instrumentation $instrumentation
     *
     * @return Composition
     */
    public function setInstrumentation(\AppBundle\Entity\Instrumentation $instrumentation = null)
    {
        $this->instrumentation = $instrumentation;

        return $this;
    }

    /**
     * Get instrumentation
     *
     * @return \AppBundle\Entity\Instrumentation
     */
    public function getInstrumentation()
    {
        return $this->instrumentation;
    }

    /**
     * Set musicalForm
     *
     * @param \AppBundle\Entity\MusicalForm $musicalForm
     *
     * @return Composition
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

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return Composition
     */
    public function setStatus(\AppBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set tonality
     *
     * @param \AppBundle\Entity\Tonality $tonality
     *
     * @return Composition
     */
    public function setTonality(\AppBundle\Entity\Tonality $tonality = null)
    {
        $this->tonality = $tonality;

        return $this;
    }

    /**
     * Get tonality
     *
     * @return \AppBundle\Entity\Tonality
     */
    public function getTonality()
    {
        return $this->tonality;
    }

    /**
     * Set transcriber
     *
     * @param \AppBundle\Entity\Composer $transcriber
     *
     * @return Composition
     */
    public function setTranscriber(\AppBundle\Entity\Composer $transcriber = null)
    {
        $this->transcriber = $transcriber;

        return $this;
    }

    /**
     * Get transcriber
     *
     * @return \AppBundle\Entity\Composer
     */
    public function getTranscriber()
    {
        return $this->transcriber;
    }


}
