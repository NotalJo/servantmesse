<?php

namespace App\Form;

use App\Entity\Paroisse;
use App\Entity\SubdivisionEcclesiastique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParoisseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomParoisse')
            ->add('adresseParoisse')
            ->add('subdivisionEcclesiastique',EntityType::class,[
                'class' => SubdivisionEcclesiastique::class,
                'choice_label' => 'nomSubdivision'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Paroisse::class,
        ]);
    }
}
