<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Production;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('Name')
            ->add('Materials', ChoiceType::class, [
                'label' => 'Matériaux',
                'choices' => [
                    'Acier Nitruré' => 'Acier Nitruré',
                    'Acier Inox' => 'Acier Inox',
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'inputPictures'
                ],
            ])
            ->add('Tuning', ChoiceType::class, [
                'label' => 'Accordage',
                'choices' => [
                    '432 Hz' => '432 Hz',
                    '440 Hz' => '440 Hz',
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('Note_Number', ChoiceType::class, [
                'label' => 'Nombre de notes',
                'choices' => [
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'input'
                ],
            ])
//            ->add('Price')
//            ->add('client', EntityType::class, [
//                'class' => Client::class,
//                'choice_label' => 'id',
//                'required' => false,
//                'mapped' => false,
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Production::class,
        ]);
    }
}
