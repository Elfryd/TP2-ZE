<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 10:28
 */

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlayerController extends Controller
{
    /**
     * @Route(path="/player/index", name="player_list")
     */
    public function indexAction()
    {
        $players = $this->getDoctrine()->getRepository(Player::class)->findAll();

        return $this->render('player/player_index.html.twig', ['players' => $players]);
    }

    /**
     * @Route(path="player/index/reset", name="reset_list_player")
     */
    public function resetPlayers() {
        $players = $this->getDoctrine()->getRepository(Player::class)->findAll();
        foreach ($players as $player) {
            $player->setHealthPoint(100);
        }
        return $this->redirectToRoute('player_list');
    }
}