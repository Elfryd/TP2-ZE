<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 10:37
 */

namespace App\Fight;
use App\Entity\Weapon;

class DamageCalculator
{
    public function calculate(Weapon $weapon, $range) {
        $damage =$weapon->getDamage() - ($range * $weapon->getDamageDistanceCoef());
        if($damage < 0) {
            return 0;
        }
        return round($damage);
    }

}