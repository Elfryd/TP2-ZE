<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 08:49
 */

namespace App\Entity;

/**
 * Class Player
 * @package App\Entity
 * @ORM\Entity
 */
class Player
{
    protected $id;
    protected $name;
    protected $healthPoint = 100;
    protected $currentWeapon;
}