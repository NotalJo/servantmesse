<?php

namespace App\Form;

use App\Entity\Archidiocese;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArchidioceseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomArchidiocese')
            ->add('nomArcheveque')
            ->add('pays',EntityType::class,[
                'class' => Pays::class,
                'choice_label' => 'nomPays'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Archidiocese::class,
        ]);
    }
}
