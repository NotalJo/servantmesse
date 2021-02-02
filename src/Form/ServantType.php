<?php

namespace App\Form;

use App\Entity\Paroisse;
use App\Entity\Servant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('paroisseServant',EntityType::class,[
                'class' => Paroisse::class,
                'choice_label' => 'nomParoisse'
            ])
            ->add('photoServant')
            //image pas lié à la base de données
            ->add('images', FileType::class,[
                'label' =>false,
                'multiple' => false,
                'mapped' => false,
                'required' =>false
            ])
            ->add('nomServant')
            ->add('prenomServant')
            ->add('dateNaissance', DateType::class,[
                'widget' =>'choice'
            ])
            ->add('lieuNaissance')
            ->add('adresseServant')
            ->add('fonctionServant')
            ->add('centreInteret')
            ->add('dateAdhesion',DateType::class,[
                'widget' =>'choice'
            ])
            ->add('groupeServant')
            ->add('pereServant')
            ->add('mereServant')
            ->add('mailServant')
            ->add('fbServant')
            ->add('contactOrange')
            ->add('contactTelma')
            ->add('contactAirtel')
            ->add('dateBapteme',DateType::class,[
                'widget' =>'choice'
            ])
            ->add('paroisseBapteme')
            ->add('dateCommunion',DateType::class,[
                'widget' =>'choice'
            ])
            ->add('paroisseCommunion')
            ->add('dateConfirmation',DateType::class,[
                'widget' =>'choice'
            ])
            ->add('paroisseConfirmation')

            ->add('etatBadge')
            ->add('codeQR')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Servant::class,
        ]);
    }
}
