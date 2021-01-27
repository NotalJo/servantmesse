<?php

namespace App\Form;

use App\Entity\Diocese;
use App\Entity\SubdivisionEcclesiastique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubdivisionEcclesiastiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dioceseSubdivision',EntityType::class,[
                'class' => Diocese::class,
                'choice_label' => 'nomDiocese'
            ])
            ->add('nomSubdivision')
            ->add('niveauSubdivision')
            ->add('lieuSubdivision')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SubdivisionEcclesiastique::class,
        ]);
    }
}
