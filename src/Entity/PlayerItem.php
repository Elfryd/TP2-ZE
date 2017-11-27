<?php

/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 27/11/17
 * Time: 15:01
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\ManyToOne(targetEntity="Player")
     */
    protected $player;
    /**
     * @var Item
     * @ORM\ManyToOne(targetEntity="Item")
     */
    protected $item;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $position;
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

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

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }




}