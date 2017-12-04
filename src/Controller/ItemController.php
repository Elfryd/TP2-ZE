<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 27/11/17
 * Time: 15:45
 */

namespace App\Controller;


use App\Entity\Item;
use App\Form\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ItemController extends Controller
{
    /**
     * @return Response
     * @Route("/item/new", name="app_item_new")
     */
    public function new_(Request $request) { //persist
        $item = new Item();
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();
            var_dump($item);
            //return $this->redirectToRoute('app_item_index');
        }
        return $this->render('item/item_new.html.twig',array('form' => $form->createView()));
    }
    /**
     * @return Response
     * @Route("/item/index", name="app_item_index")
     */
    public function index() { //list
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Item::class);
        $tabItems = $repo->findAll();
        return $this->render('item/item_index.html.twig',array('tabItems' => $tabItems));
    }

    /**
     * @return Response
     * @Route("/item/show/{id}", name="app_item_show")
     */
    public function show($id) {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Item::class);
        $item = $repo->find($id);
        return $this->render('item/item_show.html.twig',array('item' => $item));
    }
}