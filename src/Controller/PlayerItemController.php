<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 27/11/17
 * Time: 15:46
 */

namespace App\Controller;

use App\Entity\PlayerItem;
use App\Form\PlayerItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PlayerItemController extends Controller
{
    /**
     * @return Response
     * @Route("/player_item/new", name="app_player_item_new")
     */
    public function new_(Request $request)
    { //persist
        $player_item = new PlayerItem();
        $form = $this->createForm(PlayerItemType::class, $player_item);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player_item);
            $em->flush();
            return $this->redirectToRoute('app_player_item_index');
        }
        return $this->render('player_item/player_item_new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @return Response
     * @Route("/player_item/show/{id}", name="app_player_item_show")
     */
    public function show($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(PlayerItem::class);
        $player_item = $repo->find($id);
        return $this->render('player_item/player_item_show.html.twig', array('player_item' => $player_item));
    }

    /**
     * @return Response
     * @Route("/player_item/index", name="app_player_item_index")
     */
    public function index()
    { //list
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(PlayerItem::class);
        $tabPlayerItems = $repo->findAll();
        return $this->render('player_item/player_item_index.html.twig', array('tabPlayerItems' => $tabPlayerItems));
    }
}