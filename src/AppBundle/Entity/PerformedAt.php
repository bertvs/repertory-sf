<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PerformedAt
 *
 * @ORM\Table(name="performed_at")
  * @ORM\Entity(repositoryClass="AppBundle\Repository\PerformedAtRepository")

 */
class PerformedAt
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
     * @var \AppBundle\Entity\Concert
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Concert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="concert_id", referencedColumnName="id")
     * })
     * @ORM\Id
     */
    private $concert;

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
     * @return PerformedAt
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
     * Set Concert
     *
     * @param \AppBundle\Entity\Concert $concert
     *
     * @return PerformedAt
     */
    public function setConcert(\AppBundle\Entity\Concert $concert = null)
    {
        $this->concert = $concert;

        return $this;
    }

    /**
     * Get Concert
     *
     * @return \AppBundle\Entity\Concert
     */
    public function getConcert()
    {
        return $this->concert;
    }



    /**
     * Set position
     *
     * @param integer $position
     *
     * @return PerformedAt
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
