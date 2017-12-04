<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PlayerType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Player::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("name", TextType::class)
            ->add("role")
            ->addEventListener(FormEvents::PRE_SET_DATA,
                array($this, 'onPreSetData') );
    }

    public function onPreSetData(FormEvent $event)
    {
        $player = $event->getData();
        $form = $event->getForm();
        if ($player->getId() !== null){
            $form->add('addMoney', null, ['mapped'=>false]);
            $form->add('addExperience', null, ['mapped'=>false]);
            $form->remove("name");
            $form->remove("role");
        }
        else {
            $form->remove('money');
            $form->remove('experience');
        }
        $form->add('submit', SubmitType::class);
    }
}