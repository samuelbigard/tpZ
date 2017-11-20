<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 20/11/17
 * Time: 14:37
 */

namespace App\Controller;


use App\Entity\Inventory;
use App\Form\InventoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InventoryController extends Controller
{
    public function newInventory(Request $request){
        $inventory = new Inventory();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(InventoryType::class, $inventory);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $inventoryCalculate = $this->get(\App\Calculate\Inventory::class);
            $inventoryCalculate->setInventory($inventory);
            $inventoryCalculate->setPerson($inventory->getPerson());
            if($inventoryCalculate->calcul()){
                $em->persist($inventory);
                $em->flush();
            }
        }

        return $this->render("Inventory/new.html.twig", array("form"=>$form->createView()));
    }
}