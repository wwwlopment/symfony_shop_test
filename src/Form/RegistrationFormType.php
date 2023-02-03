<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'name',
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
                'phone',
                TelType::class,
                [
                    'label' => 'phone',
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
                'plainPassword',
                RepeatedType::class,
                [

                    // instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false,
                    'type' => PasswordType::class,
                    'required' => true,
                    'first_options' => [
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
                        ],
                    'second_options' => [
                        'label' => 'repeat password',
                        'label_attr' => [
                            'class' => 'info-title',
                        ],
                        'row_attr' => [
                            'class' => 'form-group',
                        ],
                        'attr' => [
                            'class' => 'form-control unicase-form-control text-input'
                        ],
                        ],
                    'constraints' => [
                        new NotBlank(
                            [
                                'message' => 'Please enter a password',
                            ]
                        ),
                        new Length(
                            [
                                'min' => 6,
                                'minMessage' => 'Your password should be at least {{ limit }} characters',
                                // max length allowed by Symfony for security reasons
                                'max' => 4096,
                            ]
                        ),
                    ],
                ]
            )
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'reg.title',
                    'attr' => [
                        'class' => 'btn-upper btn btn-primary checkout-page-button'
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => [
                'class' => 'register-form outer-top-xs',
                'role' => 'form'
            ]
        ]);
    }
}
