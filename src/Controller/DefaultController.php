<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     *  @Route("/", name="hello_world")
     */
    function index(){
        return $this->render(
            'Default/index.html.twig',[]
        );
    }

}