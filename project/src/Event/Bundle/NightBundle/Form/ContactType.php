<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 26/12/2016
 * Time: 14:05
 */

namespace Event\Bundle\NightBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Email', EmailType::class, array(
                'attr' => array(
                    'placeholder' => 'Ajouter un email',
                )
            ))
            ->add('Objet', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Ajouter un objet',
                )
            ))
            ->add('Message', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => 'Ajouter un message',
                )
            ))
            ->add('Envoyer', SubmitType::class)
        ;
    }

}