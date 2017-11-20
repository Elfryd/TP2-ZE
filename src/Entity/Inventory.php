<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 20/11/17
 * Time: 14:05
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Material
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="inventory")
 */
class Inventory
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var Person
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    protected $person;
    /**
     * @var Material
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     */
    protected $material;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $number_of_item;

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
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return Material
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param Material $material
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }

    /**
     * @return int
     */
    public function getNumberOfItem()
    {
        return $this->number_of_item;
    }

    /**
     * @param int $number_of_item
     */
    public function setNumberOfItem($number_of_item)
    {
        $this->number_of_item = $number_of_item;
    }


}