<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 10:59
 */

namespace App\Fight;
use App\Entity\Player;
use App\Fight\Fight;


class FightHandler
{
    /**
     * @var DamageCalculator
     */
    private $damageCalculator;

    /**
     * FightHandler constructor.
     * @param $damageCalculator
     */
    public function __construct()
    {
        $this->damageCalculator = new DamageCalculator();
    }

    public function handle($fight)
    {
        $weapon = $fight->player->getCurrentWeapon();
        $damage = $this->damageCalculator->calculate($weapon,$fight->distance);

        $fight->target->setHealthPoint($fight->target->getHealthPoint()-$damage);
    }

}