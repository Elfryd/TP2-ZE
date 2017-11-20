<?php

/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 13/11/17
 * Time: 14:09
 */
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person
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
     * @ORM\Column(type="string",length=40)
     */
    protected $name;
    /**
     * @var int
     * @ORM\Column(type="decimal")
     */
    protected $max_weight;

    /**
     * @var Inventory[]
     * @ORM\OneToMany(targetEntity="Inventory",mappedBy="person")
     */
    protected $inventories;

    public function __construct()
    {
        $this->inventories = new ArrayCollection();
    }

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
    public function getMaxWeight()
    {
        return $this->max_weight;
    }

    /**
     * @param int $max_weight
     */
    public function setMaxWeight($max_weight)
    {
        $this->max_weight = $max_weight;
    }

    /**
     * @return Inventory[]
     */
    public function getInventories()
    {
        return $this->inventories;
    }

    /**
     * @param Inventory[] $inventories
     */
    public function setInventories($inventories)
    {
        $this->inventories = $inventories;
    }

    public function __toString()
    {
        return $this->name;
    }
}