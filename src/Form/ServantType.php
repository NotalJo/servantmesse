<?php

namespace App\Form;

use App\Entity\Servant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photoServant')
            ->add('nomServant')
            ->add('prenomServant')
            ->add('dateNaissance')
            ->add('lieuNaissance')
            ->add('adresseServant')
            ->add('fonctionServant')
            ->add('centreInteret')
            ->add('dateAdhesion')
            ->add('groupeServant')
            ->add('pereServant')
            ->add('mereServant')
            ->add('mailServant')
            ->add('fbServant')
            ->add('contactOrange')
            ->add('contactTelma')
            ->add('contactAirtel')
            ->add('dateBapteme')
            ->add('paroisseBapteme')
            ->add('dateCommunion')
            ->add('paroisseCommunion')
            ->add('dateConfirmation')
            ->add('paroisseConfirmation')
            ->add('referenceServant')
            ->add('etatBadge')
            ->add('codeQR')
            ->add('paroisseServant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Servant::class,
        ]);
    }
}
