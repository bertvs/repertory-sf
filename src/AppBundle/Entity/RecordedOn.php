<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecordedOn
 *
 * @ORM\Table(name="recorded_on")
  * @ORM\Entity(repositoryClass="AppBundle\Repository\RecordedOnRepository")

 */
class RecordedOn
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
     * @var \AppBundle\Entity\Album
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     * })
     * @ORM\Id
     */
    private $album;

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
     * @return RecordedOn
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
     * Set album
     *
     * @param \AppBundle\Entity\Album $album
     *
     * @return RecordedOn
     */
    public function setAlbum(\AppBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \AppBundle\Entity\Album
     */
    public function getAlbum()
    {
        return $this->album;
    }



    /**
     * Set position
     *
     * @param integer $position
     *
     * @return RecordedOn
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
