<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 13/11/17
 * Time: 14:44
 */

namespace App\Controller;

use App\AppEvent;
use App\Entity\Player;


use App\Entity\PlayerItem;
use App\Event\PlayerEvent;
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
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository(Player::class)->findAll();
        return $this->render("index.html.twig", array("players"=>$players));
    }

    /**
     * @Route("/newPlayer",name="new_player")
     */
    public function newPlayer(Request $request){
        $player = $this->get(\App\Entity\Player::class);
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $playerEvent = $this->get(PlayerEvent::class);
            $playerEvent->setPlayer($player);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::PLAYER_ADD, $playerEvent);
            return $this->redirectToRoute("list_player");
        }

        return $this->render("Player/new.html.twig", array("form"=>$form->createView()));
    }
}