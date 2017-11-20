<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 20/11/17
 * Time: 13:40
 */

namespace App\Form;


use App\Entity\Material;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterialType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Material::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("name")
            ->add("weight")
            ->add("save", SubmitType::class, array("label"=>"Creer"));
    }
}