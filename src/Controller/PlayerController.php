<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 27/11/17
 * Time: 15:45
 */

namespace App\Controller;

use App\Form\PlayerType;
use App\Entity\Player;
use App\AppEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PlayerController extends Controller
{
    /**
     * @return Response
     * @Route("/player/new", name="app_player_new")
     */
    public function new_(Request $request) { //persist
        $player = $this->get(\App\Entity\Player::class);
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $playerEvent = $this->get('app.player.event');
            $playerEvent->setPlayer($player);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::PLAYER_ADD, $playerEvent);
            return $this->redirectToRoute('app_player_index');
        }
        return $this->render('player/player_new.html.twig',array('form' => $form->createView()));
    }

    /**
     * @return Response
     * @Route("/player/edit/{id}", name="app_player_edit")
     */
    public function edit($id, Request $request) {
        $player = $this->getDoctrine()->getManager()->getRepository(\App\Entity\Player::class)->find($id);
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $playerEvent = $this->get('app.player.event');
            $playerEvent->setPlayer($player);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::PLAYER_EDIT, $playerEvent);
            return $this->redirectToRoute('app_player_index');
        }
        return $this->render('player/player_edit.html.twig',array('form' => $form->createView()));
    }

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