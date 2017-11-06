<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     *  @Route("/annotation", name="hello_world")
     */
    function index2(){
        return $this->render(
            'Default/index2.html.twig',[]
        );
    }

    function index(){
        return $this->render(
            'Default/index.html.twig',[]
        );
    }

    function create(){
        $user = new User();
        $user->setNom("Bigard");
        $user->setPrenom("Samuel");
        $user->setMail("samuelbigard@gmail.com");
        $user->setNomGitHub("samuelbigard");

        return $this->render(
            'Default/create.html.twig',["nom"=>$user->getNom(), "prenom"=>$user->getPrenom()]
        );
    }

    function show($id){
        $tab = $this->getList();
        foreach ($tab as $user){
            if($user->getId() == $id)
                return $this->render(
                    'Default/show.html.twig',["user"=>$user]
                );
        }
    }

    private function getList(){
        $user = new User();
        $user->setId(0);
        $user->setNom("Bigard");
        $user->setPrenom("Samuel");
        $user->setMail("samuelbigard@gmail.com");
        $user->setNomGitHub("samuelbigard");
        $user->setDiscord("Renakk#1234");

        $user1 = new User();
        $user1->setId(1);
        $user1->setNom("Chatelet");
        $user1->setPrenom("Hadrien");
        $user1->setMail("hadrienchatelet@gmail.com");
        $user1->setNomGitHub("hadrienchatelet");

        $user2 = new User();
        $user2->setId(2);
        $user2->setNom("Delarre");
        $user2->setPrenom("Alexis");
        $user2->setMail("alexisdelarre@gmail.com");
        $user2->setNomGitHub("alexisdelarre");

        $tab = [$user,$user1,$user2];
        return $tab;
    }

    function listUser(){
        return $this->render(
            'Default/list.html.twig',["tabUser"=>$this->getList()]
        );
    }
}