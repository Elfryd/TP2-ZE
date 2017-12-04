<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 04/12/17
 * Time: 14:15
 */

namespace App\Form;

use App\AppEvent;
use App\Entity\Player;
use App\Entity\Item;
use App\Subscriber\PlayerSubscriber;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('name', TextType::class)
            ->add('age', IntegerType::class)
            ->add('country', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Créer'));*/
        $builder
            ->add('name')
            ->add('rolesPlayer')
            ->addEventListener( FormEvents::PRE_SET_DATA,
                array($this, 'preSetData') );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // FIXME: ajouter la configuration du form
    }

    public function preSetData(FormEvent $event) {
        $player = $event->getData();
        $form = $event->getForm();
        $label = 'Créer';
        if ($player->getId() !== null){
            $form->remove('name');
            $form->remove('rolesPlayer');
            $form->add('money');
            $form->add('experiences');
            $label = 'Mettre à jour';
        }
        $form->add('save', SubmitType::class, array('label' => $label));
    }
}