<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 09:40
 */

namespace App\DataFixtures\ORM;

use App\Entity\Player;
use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadPlayer extends Fixture
{
    public function load(ObjectManager $manager) {

        $faker = Factory::create();

        $players = array(
            $faker->name => 'shotgun',
            $faker->name => 'shotgun',
            $faker->name => 'sniper',
            $faker->name => 'm4',
            $faker->name => 'm4',
            $faker->name => 'm4',
            $faker->name => 'handgun',
            $faker->name => 'handgun'
        );

        foreach ($players as $name => $weapon) {
            $player = new Player();
            $player->setName($name);
            $player->setCurrentWeapon($this->getReference($weapon));
            $manager->persist($player);
        }
        $manager->flush();
    }


    public function getDependencies()
    {
        return [LoadWeapon::class];
    }
}