<?php

/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 13/11/17
 * Time: 14:16
 */
namespace  App\Controller;

use App\Entity\Person;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
        $formBuilder = $this->createFormBuilder($person);
        $formBuilder->add('name', TextType::class);
        $formBuilder->add('age', IntegerType::class);
        $formBuilder->add('visible', CheckboxType::class, array('label' => 'Visible ou pas?', 'required' => false));
        $formBuilder->add('color', TextType::class);
        $formBuilder->add('createdAt', DateType::class);
        $formBuilder->add('save', SubmitType::class, array('label' => 'Créer'));
        $form = $formBuilder->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            echo 'Ca a marché !!!';
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            $this->index();
        }
        return $this->render('person/person_new.html.twig',array('form' => $form->createView()));
    }

    public function newGetPostAction(Request $request) {
        $entity = new Entity();
        $form = $this->createForm(EntityType::class,$entity);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

        }
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