<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PublishedIn
 *
 * @ORM\Table(name="published_in")
  * @ORM\Entity(repositoryClass="AppBundle\Repository\PublishedInRepository")

 */
class PublishedIn
{

    /**
     * @var \AppBundle\Entity\Composition
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Composition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="composition_id", referencedColumnName="id")
     * })
     * @ORM\Id
     */
    private $composition;

    /**
     * @var \AppBundle\Entity\Score
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Score")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="score_id", referencedColumnName="id")
     * })
     * @ORM\Id
     */
    private $score;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     * @ORM\Id
     */
    private $position;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Set composition
     *
     * @param \AppBundle\Entity\Composition $composition
     *
     * @return PublishedIn
     */
    public function setComposition(\AppBundle\Entity\Composition $composition = null)
    {
        $this->composition = $composition;

        return $this;
    }

    /**
     * Get composition
     *
     * @return \AppBundle\Entity\Composition
     */
    public function getComposition()
    {
        return $this->composition;
    }


    /**
     * Set Score
     *
     * @param \AppBundle\Entity\Score $score
     *
     * @return PublishedIn
     */
    public function setScore(\AppBundle\Entity\Score $score = null)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get Score
     *
     * @return \AppBundle\Entity\Score
     */
    public function getScore()
    {
        return $this->score;
    }



    /**
     * Set position
     *
     * @param integer $position
     *
     * @return PublishedIn
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

}
