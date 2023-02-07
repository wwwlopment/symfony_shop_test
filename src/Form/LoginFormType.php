<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginFormType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder

            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'email',
                    'label_attr' => [
                        'class' => 'info-title',
                    ],
                    'row_attr' => [
                        'class' => 'form-group',
                    ],
                    'attr' => [
                        'class' => 'form-control unicase-form-control text-input'
                    ],
                ]
            )
            ->add(
                'password',
                PasswordType::class,
                [
                    'label' => 'password',
                    'label_attr' => [
                        'class' => 'info-title',
                    ],
                    'row_attr' => [
                        'class' => 'form-group',
                    ],
                    'attr' => [
                        'class' => 'form-control unicase-form-control text-input'
                    ],
                ])
/*            ->add('forgotPassword', [

            ])*/
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'login.title',
                    'attr' => [
                        'class' => 'btn-upper btn btn-primary checkout-page-button',

                    ],
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => true,
            'attr' => [
                'class' => 'register-form outer-top-xs',
                'role' => 'form',
            ]
        ]);
    }
}
