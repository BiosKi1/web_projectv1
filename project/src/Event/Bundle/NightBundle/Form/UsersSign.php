<?php

namespace Event\Bundle\NightBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsersSign extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('pseudo')
            ->add('mdp')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            ->add('mail', EmailType::class)
            ->add('genre', ChoiceType::class, array(
                'choices' => array(
                    'Shônen' => 'Shônen',
                    'Shôjo' => 'Shôjo',
                    'Hentai' => 'Hentai',
                    'Dôjinshi ' => 'Dôjinshi ',
                    'Yaoi  / Yuri ' => 'Yaoi',
                    'Shônen-ai' => 'Shônen-ai',
                    'Seinen' => 'Seinen')))
            ->add('couverture',FileType::class)
            ->add('save', SubmitType::class, array('label' => 'Inscription'))
            ->add('dateInsription', HiddenType::class, array(
                'attr' => array('value' => (new \DateTime())->format('Y-m-d H:i'))
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Event\Bundle\NightBundle\Entity\Users'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'event_bundle_nightbundle_users';
    }


}
