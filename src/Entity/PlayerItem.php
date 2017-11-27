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
 * Class Player
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="player_item")
 */
class PlayerItem
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var Player
     */
    protected $player;
    /**
     * @var Item
     */
    protected $item;
    /**
     * @var int
     */
    protected $position;
    /**
     * @var Date
     */
    protected $created_at;
}