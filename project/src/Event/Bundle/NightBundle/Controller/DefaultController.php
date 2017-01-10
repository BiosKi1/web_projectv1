<?php

namespace Event\Bundle\NightBundle\Controller;


use Event\Bundle\NightBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="Accueil")
     */
    public function indexAction()
    {
        return $this->render('EventNightBundle:Default:index.html.twig');
    }

    public function contactAction(Request $request)
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $message = \Swift_Message::newInstance()
                ->setSubject($form->get('Objet')->getData())
                ->setFrom($form->get('Email')->getData())
                ->setTo($form->get('Email')->getData()) //'projectece100@gmail.com'
                ->setBody($form->get('Message')->getData());
            $this->get('mailer')->send($message);

            $this->addFlash('success', 'Envoi du mail réussi');
        }

        return $this->render('@EventNight/Default/contact.html.twig', array(
            'form' => $form ->createView()
        ));

        /*$name = $request->request->get('contactname');
        $email = $request->request->get('email');
        $subject = $request->request->get('subject');
        $body = $request->request->get('body');

        $data = "";
        if($request->request->get('submit'))
        {
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($email)
                ->setTo('test@gmail.com')
                ->setBody($body);
            $this->get('mailer')->send($message);
            $data = "thanks";
        }

        return $this->render('@EventNight/Default/contact.html.twig', array(
            'data' => $data,
        ));*/
    }

    /*public function adminAction()
    {
        $res = new Response('<html><body>Admin page!</body></html>');
        return $res;
    }*/

}
