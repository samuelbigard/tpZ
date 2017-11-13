<?php

namespace App\Form;

use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PersonType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Person::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("name", TextType::class)
            ->add("age", IntegerType::class)
            ->add("createdAt", DateType::class)
            ->add("color", TextType::class)
            ->add("visible", CheckboxType::class)
            ->add("save", SubmitType::class, array("label"=>"Creer"));
    }
}