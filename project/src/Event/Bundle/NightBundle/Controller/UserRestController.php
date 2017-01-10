<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/01/2017
 * Time: 00:17
 */

namespace Event\Bundle\NightBundle\Controller;

use Event\Bundle\NightBundle\Entity\Users;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Event\Bundle\NightBundle\Controller\UsersController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
class UserRestController extends FOSRestController
{


    /**
     * @Rest\Get("/users")
     */
    public function getAction()
    {
        $resrest = $this->getDoctrine()->getRepository('EventNightBundle:Users')->findAll();

        return $resrest;
    }

    /**
     * @Rest\Get("/user/{id}")
     */
    public function idAction($id)
    {
        $resrest = $this->getDoctrine()->getRepository('EventNightBundle:Users')->find($id);
        return $resrest;
    }

    /**
     * @Rest\Get("/userdel/{id}")
     */
    public function deleteAction($id)
    {
        $data = new Users();
        $sn = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('EventNightBundle:Users')->find($id);
        if (empty($user)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($user);
            $sn->flush();
        }
        return new View("deleted successfully", Response::HTTP_OK);
    }

    /**
     * @Rest\Post("/user/")
     */
    public function postAction(Request $request)
    {
        $data = new Users();
        $name = $request->get('nom');
        $role = $request->get('prenom');


        if(empty($name) || empty($role))
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $data->setNom($name);
        $data->setPrenom($role);


        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new View("User Added Successfully", Response::HTTP_OK);
 }
}