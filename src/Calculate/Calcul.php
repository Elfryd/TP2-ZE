<?php

/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 20/11/17
 * Time: 16:34
 */
namespace App\Calculate;

use App\Entity\Person;
use Doctrine\ORM\EntityManager;

class Inventory
{
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var Person
     */
    private $person;
    /**
     * @var Inventory
     */
    private $inventory;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function calcul()
    {
        $sum = 0;
        foreach ($this->person->getInventories() as $inventory) {
            $sum += $inventory->getMaterial()->getWeight()*$inventory->getNumberOfItem();
        }
        if($sum > $this->person->getMaxWeight()) {
            return false;
        }
        return true;
    }


}