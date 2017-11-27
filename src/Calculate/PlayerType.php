<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 27/11/17
 * Time: 16:33
 */

namespace App\Calculate;


use Doctrine\ORM\EntityManagerInterface;

class PlayerType
{
    private $em;
    private $player;

    /**
     * Inventory constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


}