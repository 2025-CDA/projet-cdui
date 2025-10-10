<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\InternMember;
use App\Entity\CompanyMember;
use App\Entity\OrganizationMember;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
    //          ->add('roles', ChoiceType::class, [
    //     'choices' => [
    //         'Utilisateur' => 'ROLE_USER',
    //         'Administrateur' => 'ROLE_ADMIN',
    //         'Monique' => 'ROLE_MONIQUE',
    //         'Stagiaire' => 'ROLE_STAGIAIRE'
    //     ],
    //     'multiple' => true,
    //     'expanded' => true, // optionnel : cases à cocher
    // ])
            ->add('Password', PasswordType::class , [
                 'attr'=>[
                    'value' => 'password',
                    'autocomplete' => 'new-password'
                ]
            ] )
            ->add('firstName')
            ->add('lastName')
            ->add('login')
            ->add('companyMember', EntityType::class, [
                'class' => CompanyMember::class,
                'choice_label' => 'id',
            ])
            ->add('organizationMember', EntityType::class, [
                'class' => OrganizationMember::class,
                'choice_label' => 'id',
            ])
            ->add('internMember', EntityType::class, [
                'class' => InternMember::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
