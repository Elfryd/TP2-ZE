<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 08:49
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Player
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="player")
 * @UniqueEntity("name")
 */
class Player
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column(type="string", length=40)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern = "/^[a-z]+$/",
     *     message = "le nom ne doit contenir que des lettres minuscules ou majuscules"
     *     )
     * @Assert\Length(
     *     min = 4,
     *     max = 20,
     *     minMessage = "Impossible de créer le nom car il doit être au moins de 4 lettres.",
     *     maxMessage = "Impossible de créer le nom car il doit être au plus de 20 lettres."
     *     )
     */
    protected $name;
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 18,
     *      max = 99,
     *      minMessage = "Impossible l'âge doit-être au moins de 18 ans",
     *      maxMessage = "Impossible l'âge doit-être au plus de 99 ans"
     * )
     */
    protected $age;
    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Choice({"France","Belgique"})
     */
    protected $country;
//    /**
//     * @var int
//     * @ORM\Column(type="integer")
//     */
//    protected $healthPoint = 100;
//    /**
//     * @var Weapon
//     * @ORM\ManyToOne(targetEntity="Weapon")
//     */
//    protected $currentWeapon;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param int $age
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

//    /**
//     * @return int
//     */
//    public function getHealthPoint()
//    {
//        return $this->healthPoint;
//    }
//
//    /**
//     * @param int $healthPoint
//     */
//    public function setHealthPoint($healthPoint)
//    {
//        $this->healthPoint = $healthPoint;
//    }
//
//    /**
//     * @return Weapon
//     */
//    public function getCurrentWeapon()
//    {
//        return $this->currentWeapon;
//    }
//
//    /**
//     * @param Weapon $currentWeapon
//     */
//    public function setCurrentWeapon($currentWeapon)
//    {
//        $this->currentWeapon = $currentWeapon;
//    }


}