<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 27/11/17
 * Time: 15:01
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Item
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="item")
 */
class Item {
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @ORM\GeneratedValue
     * @ORM\Column(type="string", length=40)
     */
    protected $name;
    /**
     * @var string
     * @ORM\GeneratedValue
     * @ORM\Column(type="string", length=40)
     */
    protected $type_item;

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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTypeItem()
    {
        return $this->type_item;
    }

    /**
     * @param string $type_item
     */
    public function setTypeItem($type_item)
    {
        $this->type_item = $type_item;
    }

}