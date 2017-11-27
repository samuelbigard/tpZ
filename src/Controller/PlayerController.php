<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 13/11/17
 * Time: 14:44
 */

namespace App\Controller;

use App\Entity\Player;


use App\Entity\PlayerItem;
use App\Form\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;


class PlayerController extends Controller
{
    /**
     * @Route("/",name="index")
     */
    public function index(){
        return $this->render("index.html.twig");
    }

    /**
     * @Route("/listPlayer",name="list_player")
     */
    public function listPlayer(){
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository(Player::class)->findAll();

        return $this->render("Player/list.html.twig", array("players"=>$players));
    }

    /**
     * @Route("/player/{id}",name="show_player")
     */
    public function show(Player $player){
        $em=$this->getDoctrine()->getManager();
        $items = $em->getRepository(PlayerItem::class)->findBy(array("player"=> $player->getId()));
        return $this->render("Player/show.html.twig", array("player"=>$player, "items"=>$items));
    }

    /**
     * @Route("/newPlayer",name="new_player")
     */
    public function newPlayer(Request $request){
        $player = $this->get(\App\Entity\Player::class);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->container->get('session')->getFlashBag()->add("success","Nouveau joueur créé avec succès");
            $em->persist($player);
            $em->flush();
            return $this->redirectToRoute("list_player");
        }

        return $this->render("Player/new.html.twig", array("form"=>$form->createView()));
    }
}