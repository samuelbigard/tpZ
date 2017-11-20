<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 13/11/17
 * Time: 14:44
 */

namespace App\Controller;

use App\Entity\Person;


use App\Form\PersonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PersonController extends Controller
{
    public function index(){
        $em = $this->getDoctrine()->getManager();
        $persons = $em->getRepository(Person::class)->findAll();

        return $this->render("Person/index.html.twig", array("persons"=>$persons));
    }

    public function newPerson(Request $request){
        $person = new Person();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->container->get('session')->getFlashBag()->add("success","Nouvelle personne créé avec succès");
            $em->persist($person);
            $em->flush();
        }

        return $this->render("Person/new.html.twig", array("form"=>$form->createView()));
    }
}