<?php

namespace Event\Bundle\NightBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="Accueil")
     */
    public function indexAction()
    {
        return $this->render('EventNightBundle:Default:index.html.twig');
    }
}
