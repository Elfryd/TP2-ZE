<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 04/12/17
 * Time: 15:50
 */

namespace App\Event;


use App\Entity\Player;
use Symfony\Component\EventDispatcher\Event;

class PlayerEvent extends Event
{
    /**
     * @var Player
     */
    private $player;

    /**
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param Player $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }
}