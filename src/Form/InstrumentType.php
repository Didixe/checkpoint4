<?php

namespace App\Form;

use App\Entity\Instrument;
use App\Entity\Purchase;
use App\Entity\Rental;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Vich\UploaderBundle\Form\Type\VichFileType;

class InstrumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nom du Handpan',
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('Materials', TextType::class, [
                'label' => 'Quel matériel a été utilisé ?',
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('Tuning', TextType::class, [
                'label' => 'Quelle fréquence en Hz ?',
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('Note_Number', TextType::class, [
                'label' => 'Combien de notes ?',
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('pictureFile', VichFileType::class, [
                'label' => 'Photo',
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Supprimer l\'image ?',
                'constraints' => [
                    new File([
                        'maxSize' => '1M',
                        'mimeTypes' => ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'],
                    ]),
                ],
            ])
            ->add('Price', TextType::class, [
                'label' => 'Quel prix ?',
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('Status', ChoiceType::class, [
                'label' => 'Le handpan est il prévu pour la location ou l\'achat ?',
                'choices' => [
                    'Location' => 'Location',
                    'Achat' => 'Achat',
                    'Autre' => 'Autre'
                ],
            ])
//            ->add('rental', EntityType::class, [
//                'class' => Rental::class,
//                'choice_label' => 'id',
//            ])
//            ->add('purchase', EntityType::class, [
//                'class' => Purchase::class,
//'choice_label' => 'id',
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Instrument::class,
        ]);
    }
}
