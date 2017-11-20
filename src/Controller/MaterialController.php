<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 20/11/17
 * Time: 13:39
 */

namespace App\Controller;


use App\Entity\Material;
use App\Form\MaterialType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MaterialController extends Controller
{
    public function newMaterial(Request $request){
        $material = new Material();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(MaterialType::class, $material);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($material);
            $em->flush();
        }

        return $this->render("Material/new.html.twig", array("form"=>$form->createView()));
    }
}