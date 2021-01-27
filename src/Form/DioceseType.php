<?php

namespace App\Form;

use App\Entity\Archidiocese;
use App\Entity\Diocese;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DioceseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('archidiocese',EntityType::class,[
                'class' =>Archidiocese::class,
                'choice_label' => 'nomArchidiocese'
            ])
            ->add('nomDiocese')
            ->add('evequeActuelle')
            ->add('vicaireGenerale');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Diocese::class,
        ]);
    }
}
