<?php

namespace Event\Bundle\NightBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        $res = new Response('<p>Tets</p>');
        return $res;
    }

    private function sendEmail($data){
        $myappContactMail = 'mycontactmail@mymail.com';
        $myappContactPassword = 'yourmailpassword';

        // In this case we'll use the ZOHO mail services.
        // If your service is another, then read the following article to know which smpt code to use and which port
        // http://ourcodeworld.com/articles/read/14/swiftmailer-send-mails-from-php-easily-and-effortlessly
        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername('mymail@gmail.com')->setPassword('mypassword');

        $mailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance('Our Code World Newsletter')
            ->setFrom(array('mymail@gmail.com' => 'Our Code World'))
            ->setTo(array("mail@email.com" => "mail@mail.com"))
            ->setBody("<h1>Welcome</h1>", 'text/html');
        $result = $mailer->send($message);
    }
}
