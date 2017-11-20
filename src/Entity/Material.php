<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 20/11/17
 * Time: 13:17
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Material
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="material")
 */
class Material
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
     * @var float
     * @ORM\Column(type="float")
     */
    protected $weight;

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
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function __toString()
    {
        return $this->name;
    }


}