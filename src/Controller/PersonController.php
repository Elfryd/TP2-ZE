<?php

/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 13/11/17
 * Time: 14:16
 */
namespace  App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
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

class PersonController extends Controller
{

    /**
     * @return Response
     * @Route("/person/new", name="app_person_new")
     */
    public function new_(Request $request) { //persist
        $person = new Person();
        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            echo 'Ca a marché !!!';
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            return $this->redirectToRoute('app_person_index');
        }
        return $this->render('person/person_new.html.twig',array('form' => $form->createView()));
    }

    /**
     * @return Response
     * @Route("/person/show/{id}", name="app_person_show")
     */
    public function show($id) {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Person::class);
        $person = $repo->find($id);
        return $this->render('person/person_show.html.twig',array('person' => $person));
    }

    /**
     * @return Response
     * @Route("/person/index", name="app_person_index")
     */
    public function index() { //list
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Person::class);
        $tabPersons = $repo->findAll();
        return $this->render('person/person_index.html.twig',array('tabPersons' => $tabPersons));
    }
}