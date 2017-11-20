<?php

/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 13/11/17
 * Time: 14:16
 */
namespace  App\Controller;

use App\Entity\Inventory;
use App\Entity\Person;
use App\Form\InventoryType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class InventoryController extends Controller
{

    /**
     * @return Response
     * @Route("/inventory/new", name="app_inventory_new")
     */
    public function new_(Request $request) { //persist
        $inventory = new Inventory();
        $form = $this->createForm(InventoryType::class, $inventory);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inventory);
            $em->flush();
            return $this->redirectToRoute('app_inventory_index');
        }
        return $this->render('inventory/inventory_new.html.twig',array('form' => $form->createView()));
    }

    /**
     * @return Response
     * @Route("/inventory/show/{id}", name="app_inventory_show")
     */
    public function show($id) {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Inventory::class);
        $inventory = $repo->find($id);
        return $this->render('inventory/inventory_show.html.twig',array('inventory' => $inventory));
    }

    /**
     * @return Response
     * @Route("/inventory/index", name="app_inventory_index")
     */
    public function index() { //list
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Person::class);
        $tabInventory = $repo->findAll();
        return $this->render('inventory/inventory_index.html.twig',array('tabInventory' => $tabInventory));
    }
}