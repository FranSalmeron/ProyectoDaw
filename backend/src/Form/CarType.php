<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand')
            ->add('model')
            ->add('manufacture_year')
            ->add('mileage')
            ->add('price')
            ->add('color')
            ->add('fuelType')
            ->add('transmission')
            ->add('traction')
            ->add('doors')
            ->add('seats')
            ->add('description')
            ->add('publication_date')
            ->add('CarCondition')
            ->add('CarSold');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
