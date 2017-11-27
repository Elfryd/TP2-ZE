<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 27/11/17
 * Time: 15:45
 */

namespace App\Controller;

use App\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class PlayerController extends Controller
{
    /**
     * @return Response
     * @Route("/player/index", name="app_player_index")
     */
    public function index() { //list
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Player::class);
        $tabPlayers = $repo->findAll();
        return $this->render('player/player_index.html.twig',array('tabPlayers' => $tabPlayers));
    }

    /**
     * @return Response
     * @Route("/player/show/{id}", name="app_player_show")
     */
    public function show($id) {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Player::class);
        $player = $repo->find($id);
        return $this->render('player/player_show.html.twig',array('player' => $player));
    }
}