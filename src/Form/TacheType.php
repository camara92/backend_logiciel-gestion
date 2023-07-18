<?php

namespace App\Form;

use App\Entity\Tache;
use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('createdAt')
            ->add('dateLivraison')
            ->add('dateComplete')
            ->add('etat')
            ->add('user', EntityType::class, [
                'label'=>'utilisateur', 
                'required'=>true, 
                'class'=>Users::class, 
                'multiple'=>false, 
                'expanded'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tache::class,
        ]);
    }
}
