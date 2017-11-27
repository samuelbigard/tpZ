<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 27/11/17
 * Time: 15:45
 */

namespace App\Form;


use App\Entity\PlayerItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerItemType extends AbstractType
{
    private $nbItem;

    /**
     * PlayerItemType constructor.
     * @param $nbItem
     */
    public function __construct($nbItem)
    {
        $this->nbItem = $nbItem;
    }


    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => PlayerItem::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $tab = [];
        for($i=1; $i<$this->nbItem+1;$i++){
            $tab[$i] = $i;
        }

        $builder->add('position',
            ChoiceType::class,array(
                'choices' => $tab));
        $builder
            ->add('player')
            ->add('item')
            ->add("save", SubmitType::class, array("label"=>"Creer"));
    }
}