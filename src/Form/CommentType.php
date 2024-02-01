<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Comment;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('object', ChoiceType::class, [
                'label' => 'Objet',
                'choices' => [
                    'Location' => 'Location',
                    'Commande' => 'Commande',
                    'Demande d\'information' => 'Demande',
                    'Autre' => 'Autre',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ Objet'])
                ],
                'attr' => [
                    'class' => 'input input-width'
                ],
                ])
            ->add('Message', TextareaType::class, [
                'label' => 'Votre Message',
                'attr' => [
                    'class' => 'input input-width',
                    'rows' => 6,
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ Message'])
                ],

            ])
//            ->add('client', EntityType::class, [
//                'class' => Client::class,
//                'choice_label' => 'id',
//                'mapped' => false,
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
