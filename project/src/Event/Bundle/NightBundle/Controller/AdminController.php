<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 23/11/2016
 * Time: 22:17
 */

namespace Event\Bundle\NightBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/Users", name="Admin")
     */
    public function adminAction()
    {
        return $this->render(':users:index.html.twig');
    }
}