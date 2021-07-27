<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\Extension\Core\Type\FileType;
// use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plate')
            ->add('categorieCar')
            ->add('brandCar')
            ->add('engineCar')
            ->add('seatCar')
            // ->add('image', FileType::class, [
            //     'label' => 'Image',

            //     // unmapped means that this field is not associated to any entity property
            //     'mapped' => false,

            //     // make it optional so you don't have to re-upload the PDF file
            //     // every time you edit the Product details
            //     'required' => false,

            //     // unmapped fields can't define their validation using annotations
            //     // in the associated entity, so you can use the PHP constraint classes
            //     'constraints' => [
            //         new File([
            //             'maxSize' => '1024k',
            //             'mimeTypes' => [
            //                 'application/png',
            //                 'application/jpeg',
            //                 'application/jpg',
            //                 'application/webp',
            //             ],
            //             'mimeTypesMessage' => 'Please upload a valid PDF document',
            //         ])
            //     ],
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
