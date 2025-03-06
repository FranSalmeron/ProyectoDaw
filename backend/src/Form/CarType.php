<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

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
            ->add('doors')
            ->add('seats')
            ->add('description')
            ->add('location')
            ->add('publication_date')
            ->add('CarCondition')
            ->add('image', FileType::class, [
                'label' => 'Imagen del coche',
                'mapped' => false,  // No se mapea directamente al campo 'image' en la entidad
                'required' => false,
                'attr' => [
                    'accept' => 'image/*',  // Solo se aceptan imágenes
                ],
            ])
            ->add('CarSold')
            ->add('User')
            ->add('latitude')  
            ->add('longitude') 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
