<?php

namespace App\Form;

use App\Entity\Paroisse;
use App\Entity\Servant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('paroisseServant',EntityType::class,[
                'label' =>'Paroisse',
                'class' => Paroisse::class,
                'choice_label' => 'nomParoisse'
            ])
            ->add('photoServant',TextType::class,[
                'label' =>'Photo du servant',
            ])
            //image pas lié à la base de données
            ->add('images', FileType::class,[
                'label' =>false,
                'multiple' => false,
                'mapped' => false,
                'required' =>false
            ])
            ->add('nomServant',TextType::class,[
                'label' =>'Nom',
            ])
            ->add('prenomServant',TextType::class,[
                'label' =>'Prénom(s)',
            ])
            ->add('dateNaissance', BirthdayType::class,[
                'label' =>'Date de naissance',
                'widget' =>'single_text'
            ])
            ->add('lieuNaissance',TextType::class,[
                'label' =>'Lieu de naissance',
            ])
            ->add('adresseServant',TextType::class,[
                'label' =>'Adresse',
            ])
            ->add('fonctionServant',TextType::class,[
                'label' =>'Fonction',
            ])
            ->add('centreInteret',TextType::class,[
                'label' =>'Centre d\'intérêt',
            ])
            ->add('dateAdhesion',DateType::class,[
                'label' =>'Date d\'adhésion',
                'widget' =>'single_text'
            ])
            ->add('groupeServant',TextType::class,[
                'label' =>'Groupe',
            ])
            ->add('pereServant',TextType::class,[
                'label' =>'Père',
            ])
            ->add('mereServant',TextType::class,[
                'label' =>'Mère',
            ])
            ->add('mailServant',TextType::class,[
                'label' =>'E-mail',
            ])
            ->add('fbServant',TextType::class,[
                'label' =>'Pseudo Facebook',
            ])
            ->add('contactOrange',TelType::class,[
                'label' =>'Numéro Orange',
            ])
            ->add('contactTelma',TextType::class,[
                'label' =>'Numéro Telma',
            ])
            ->add('contactAirtel',TextType::class,[
                'label' =>'Numéro Airtel',
            ])
            ->add('dateBapteme',DateType::class,[
                'label' => 'Date de baptême',
                'widget' =>'single_text'
            ])
            ->add('paroisseBapteme',TextType::class,[
                'label' =>'Paroisse Baptême'
            ])
            ->add('dateCommunion',DateType::class,[
                'label' => 'Date du 1ère Communiion',
                'widget' =>'single_text'
            ])
            ->add('paroisseCommunion',TextType::class,[
                'label' =>'Paroisse 1ère Communion',
            ])
            ->add('dateConfirmation',DateType::class,[
                'label' => 'Date de Confirmation',
                'widget' =>'single_text'
            ])
            ->add('paroisseConfirmation',TextType::class,[
                'label' => 'Paroisse Confirmation'
            ])

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
