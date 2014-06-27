<?php

namespace Acme\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\Bundle\BlogBundle\Entity\Persona;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeBlogBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createAction()
    {
        $person = new Persona();
        $person->setAge(25);
        $person->setName("Pepe Lucho");
        $person->setStatus(1);

        $em = $this->getDoctrine()->getManager();
        $em->persist($person);
        $em->flush();

        return new Response("Create Person id = " . $person->getId());
    }

    public function showAction($id)
    {
        $person = $this->getDoctrine()->getRepository('AcmeBlogBundle:Persona')->find($id);
        //$products = $repository->findAll();

        if (!$person) {
            Throw $this->createNotFoundException("Not found id ");
        }
        //echo "<pre>"; print_r($person);
        //return new Response("Person ok");
    }
}
