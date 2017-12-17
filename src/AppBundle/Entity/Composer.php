<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composer
 *
 * @ORM\Table(name="composer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComposerRepository")
 */
class Composer
{
    /**
     * @var string
     *
     * @ORM\Column(name="initials", type="string", length=20, nullable=false)
     */
    private $initials;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=50, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
    private $lastName;

    /**
     * @var integer
     *
     * @ORM\Column(name="birth_year", type="integer", nullable=false)
     */
    private $birthYear;

    /**
     * @var integer
     *
     * @ORM\Column(name="birth_month", type="integer", nullable=true)
     */
    private $birthMonth;

    /**
     * @var integer
     *
     * @ORM\Column(name="birth_day", type="integer", nullable=true)
     */
    private $birthDay;

    /**
     * @var integer
     *
     * @ORM\Column(name="death_year", type="integer", nullable=true)
     */
    private $deathYear;

    /**
     * @var integer
     *
     * @ORM\Column(name="death_month", type="integer", nullable=true)
     */
    private $deathMonth;

    /**
     * @var integer
     *
     * @ORM\Column(name="death_day", type="integer", nullable=true)
     */
    private $deathDay;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="work_index_name", type="string", length=20, nullable=true)
     */
    private $workIndexName;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Parse as string
     */
    public function __toString() {
        return $this->initials . " " . $this->lastName;
    }

    /**
     * Set initials
     *
     * @param string $initials
     *
     * @return Composer
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;

        return $this;
    }

    /**
     * Get initials
     *
     * @return string
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Composer
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Composer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set birthYear
     *
     * @param integer $birthYear
     *
     * @return Composer
     */
    public function setBirthYear($birthYear)
    {
        $this->birthYear = $birthYear;

        return $this;
    }

    /**
     * Get birthYear
     *
     * @return integer
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * Set birthMonth
     *
     * @param integer $birthMonth
     *
     * @return Composer
     */
    public function setBirthMonth($birthMonth)
    {
        $this->birthMonth = $birthMonth;

        return $this;
    }

    /**
     * Get birthMonth
     *
     * @return integer
     */
    public function getBirthMonth()
    {
        return $this->birthMonth;
    }

    /**
     * Set birthDay
     *
     * @param integer $birthDay
     *
     * @return Composer
     */
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    /**
     * Get birthDay
     *
     * @return integer
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * Set deathYear
     *
     * @param integer $deathYear
     *
     * @return Composer
     */
    public function setDeathYear($deathYear)
    {
        $this->deathYear = $deathYear;

        return $this;
    }

    /**
     * Get deathYear
     *
     * @return integer
     */
    public function getDeathYear()
    {
        return $this->deathYear;
    }

    /**
     * Set deathMonth
     *
     * @param integer $deathMonth
     *
     * @return Composer
     */
    public function setDeathMonth($deathMonth)
    {
        $this->deathMonth = $deathMonth;

        return $this;
    }

    /**
     * Get deathMonth
     *
     * @return integer
     */
    public function getDeathMonth()
    {
        return $this->deathMonth;
    }

    /**
     * Set deathDay
     *
     * @param integer $deathDay
     *
     * @return Composer
     */
    public function setDeathDay($deathDay)
    {
        $this->deathDay = $deathDay;

        return $this;
    }

    /**
     * Get deathDay
     *
     * @return integer
     */
    public function getDeathDay()
    {
        return $this->deathDay;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Composer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set workIndexName
     *
     * @param string $workIndexName
     *
     * @return Composer
     */
    public function setWorkIndexName($workIndexName)
    {
        $this->workIndexName = $workIndexName;

        return $this;
    }

    /**
     * Get workIndexName
     *
     * @return string
     */
    public function getWorkIndexName()
    {
        return $this->workIndexName;
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
