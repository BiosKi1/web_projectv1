<?php

namespace Event\Bundle\NightBundle\Controller;

use Event\Bundle\NightBundle\Entity\Users;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SigninController extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('mdp')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            ->add('mail', EmailType::class)
            ->add('genre')
            ->add('couverture')
            ->add('acces')
            ->add('typeUser')
        ;
    }


    public function indexAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Users();
        $task->setTask('Nom');
        $task->setTask('Prenom');
        $task->setTask('Adresse');
        $task->setTask('Email');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Adresse', TextType::class)
            ->add('Email', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Inscription'))
            ->getForm();

        return $this->render('EventNightBundle:signin:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    public function a(Request $request)
    {
        if ('POST' === $request->getMethod()) {
            echo 'e';
        }
    }
}
