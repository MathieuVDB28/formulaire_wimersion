<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('email', EmailType::class)
            ->add('numtel', TextType::class)
            ->add('ville', TextType::class)
            ->add('homme', CheckboxType::class,[
                'label'=>'Homme',
                'required' => false
            ])
            ->add('femme', CheckboxType::class,[
                'label'=>'femme',
                'required' => false
            ])
            ->add('age', ChoiceType::class,[
                'choices'=> [
                    '15'=>"15",
                    '16'=>"16",
                    '17'=>"17",
                    '18'=>"18",
                    '19'=>"19",
                    '20'=>"20"
                ],
                'multiple'=>false,
                'label'=>'Age'

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
