<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tonality
 *
 * @ORM\Table(name="tonality")
 * @ORM\Entity
 */
class Tonality
{
    /**
     * @var string
     *
     * @ORM\Column(name="root", type="string", length=7, nullable=false)
     */
    private $root;

    /**
     * @var string
     *
     * @ORM\Column(name="mode", type="string", length=10, nullable=false)
     */
    private $mode;

    /**
     * @var string
     *
     * @ORM\Column(name="key_signature", type="string", length=2, nullable=false)
     */
    private $keySignature;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=7)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * Parse as string
     */
    public function __toString() {
        return $this->root . " " . $this->mode;
    }

    /**
     * Set root
     *
     * @param string $root
     *
     * @return Tonality
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return string
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set mode
     *
     * @param string $mode
     *
     * @return Tonality
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set keySignature
     *
     * @param string $keySignature
     *
     * @return Tonality
     */
    public function setKeySignature($keySignature)
    {
        $this->keySignature = $keySignature;

        return $this;
    }

    /**
     * Get keySignature
     *
     * @return string
     */
    public function getKeySignature()
    {
        return $this->keySignature;
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
}
