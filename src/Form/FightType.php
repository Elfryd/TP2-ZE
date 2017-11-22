<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 22/11/17
 * Time: 10:13
 */

namespace App\Form;

use App\Entity\Player;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Tests\Fixtures\Entity;

class FightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('player', EntityType::class, [
                'class' => Player::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                ]
            )
            ->add('distance',IntegerType::class)
            ->add('target', EntityType::class, [
                'class' => Player::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ]
            )
            ->add('save', SubmitType::class, array('label' => 'Go'));
    }
}