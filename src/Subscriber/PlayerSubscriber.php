<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 04/12/17
 * Time: 15:53
 */

namespace App\Subscriber;

use App\AppEvent;
use App\Event\PlayerEvent;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PlayerSubscriber implements EventSubscriberInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public static function getSubscribedEvents()
    {
        return array(
            AppEvent::PLAYER_ADD => 'playerAdd',
            AppEvent::PLAYER_EDIT => 'playerEdit'
        );
    }

    public function playerAdd(PlayerEvent $playerEvent){
        $player = $playerEvent->getPlayer();
        $player->setCreatedAt(new \DateTime());
        $player->setUpdatedAt(new \DateTime());
        $this->em->persist($player);
    }

    public function playerEdit(PlayerEvent $playerEvent){
        $player = $playerEvent->getPlayer();
        $player->setUpdatedAt(new \DateTime());
        $this->em->persist($player);
    }

}