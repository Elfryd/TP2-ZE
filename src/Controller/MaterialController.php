<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 20/11/17
 * Time: 13:27
 */

namespace App\Controller;

use App\Entity\Material;
use App\Form\MaterialType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MaterialController extends Controller
{
    /**
     * @return Response
     * @Route("/material/new", name="app_material_new")
     */
    public function new_(Request $request) { //persist
        $material = new Material();
        $form = $this->createForm(MaterialType::class, $material);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($material);
            $em->flush();
            return $this->redirectToRoute('app_material_index');
        }
        return $this->render('material/material_new.html.twig',array('form' => $form->createView()));
    }

    /**
     * @return Response
     * @Route("/material/show/{id}", name="app_material_show")
     */
    public function show($id) {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Material::class);
        $material = $repo->find($id);
        return $this->render('material/material_show.html.twig',array('material' => $material));
    }

    /**
     * @return Response
     * @Route("/material/index", name="app_material_index")
     */
    public function index() { //list
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Material::class);
        $tabMaterials = $repo->findAll();
        return $this->render('material/material_index.html.twig',array('tabMaterials' => $tabMaterials));
    }
}