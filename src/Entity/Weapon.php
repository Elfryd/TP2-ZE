<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 09:09
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Weapon
 * @package App\Entity
 * @ORM\Entity
 */
class Weapon
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
     */
    protected $name;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $damage;
    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $damageDistanceCoeff;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $fireRate;

    /**
     * Weapon constructor.
     * @param string $name
     * @param int $damage
     * @param float $damageDistanceCoeff
     * @param int $fireRate
     */
    public function __construct($name, $damage, $damageDistanceCoeff, $fireRate)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->damageDistanceCoeff = $damageDistanceCoeff;
        $this->fireRate = $fireRate;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return float
     */
    public function getDamageDistanceCoeff()
    {
        return $this->damageDistanceCoeff;
    }

    /**
     * @return int
     */
    public function getFireRate()
    {
        return $this->fireRate;
    }



}