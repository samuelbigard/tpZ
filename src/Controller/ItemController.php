<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 20/11/17
 * Time: 13:39
 */

namespace App\Controller;


use App\Entity\Item;
use App\Form\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends Controller
{
    /**
     * @Route("/listItem", name="list_item")
     */
    public function listItem(){
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository(Item::class)->findAll();

        return $this->render("Item/list.html.twig", array("items"=>$items));
    }

    /**
     * @Route("/newItem",name="new_item")
     */
    public function newMaterial(Request $request){
        $item = $this->get(\App\Entity\Item::class);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($item);
            $em->flush();
        }

        return $this->render("Item/new.html.twig", array("form"=>$form->createView()));
    }
}