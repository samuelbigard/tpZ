<?php

namespace App\Subscriber;

use App\AppEvent;
use App\Entity\Player;
use App\Event\PlayerEvent;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PlayerSubscriber implements EventSubscriberInterface
{

    private $entityManager;

    /**
     * PlayerSubscriber constructor.
     * @param $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public static function getSubscribedEvents()
    {
        return array(AppEvent::PLAYER_ADD => 'playerAdd');
    }

    public function playerAdd(PlayerEvent $playerEvent){
        $this->entityManager->persist($playerEvent->getPlayer());
        $this->entityManager->flush();
    }

}