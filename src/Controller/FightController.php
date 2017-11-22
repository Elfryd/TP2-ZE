<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 10:20
 */

namespace App\Controller;

use App\Fight\DamageCalculator;
use App\Form\FightType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FightController extends Controller
{
    /**
     * @Route(path="/fight/new", name="fight")
     */
    public function indexAction(Request $request, EntityManager $manager)
    {
        $form = $this->createForm(FightType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var \App\Fight\Fight $fight */
            $fight = $form->getData();
        }

        return $this->render('fight/fight_index.html.twig', ['form' => $form->createView()]);
    }
}