<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pharmacy
 *
 * @ORM\Table(name="pharmacy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PharmacyRepository")
 */
class Pharmacy
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_pharmacy", type="string", length=100, unique=true)
     * @Assert\NotBlank(message="Entrez le nom de votre pharmacy .")
     * @Assert\Length(
     *     min=3,
     *     max=150,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long."
     * )
     */
    private $namePharmacy;

    /**
     * @var string
     * @Assert\NotBlank(message="Entrez si vous êtes pharmacy jour ou nuit .")
     * @ORM\Column(name="opening_time", type="string", length=50)
     */
    private $openingTime;


    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User",cascade={"persist","remove"})
     * @Assert\Valid
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set namePharmacy
     *
     * @param string $namePharmacy
     *
     * @return Pharmacy
     */
    public function setNamePharmacy($namePharmacy)
    {
        $this->namePharmacy = $namePharmacy;

        return $this;
    }

    /**
     * Get namePharmacy
     *
     * @return string
     */
    public function getNamePharmacy()
    {
        return $this->namePharmacy;
    }

    /**
     * Set openingTime
     *
     * @param string $openingTime
     *
     * @return Pharmacy
     */
    public function setOpeningTime($openingTime)
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    /**
     * Get openingTime
     *
     * @return string
     */
    public function getOpeningTime()
    {
        return $this->openingTime;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Pharmacy
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
