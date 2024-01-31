<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ Email'])
                ],
                'attr' => [
                    'class' => 'input'
                ],

            ])
            ->add('Name', TextType::class, [
                'label' => 'Votre Nom',
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ Email'])
                ],
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('other_information', TextareaType::class, [
                'label' => 'Autres informations',
                'attr' => [
                    'class' => 'input'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
