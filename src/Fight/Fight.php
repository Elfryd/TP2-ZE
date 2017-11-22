<?php

/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 10:35
 */

namespace App\Fight;


use App\Entity\Player;

class Fight
{
    /**
     * @var Player
     */
    public $player;
    /**
     * @var int
     */
    public $distance;
    /**
     * @var Player
     */
    public $target;
}