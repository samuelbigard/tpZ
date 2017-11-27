<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 27/11/17
 * Time: 15:54
 */

namespace App\Controller;


use App\Form\PlayerItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PlayerItemController extends Controller
{
    /**
     * @Route("/newPlayerItem", name="new_playerItem")
     */
    public function newPlayerItem(Request $request){
        $playerItem = $this->get(\App\Entity\PlayerItem::class);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PlayerItemType::class, $playerItem);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
                $em->persist($playerItem);
                $em->flush();
            return $this->redirectToRoute("show_player", array("id"=>$playerItem->getPlayer()->getId()));
        }

        return $this->render("Inventory/new.html.twig", array("form"=>$form->createView()));
    }
}