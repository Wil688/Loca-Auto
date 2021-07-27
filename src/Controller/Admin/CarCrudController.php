<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('plate', 'Plaque d\'immatriculation'),
            // TextField::new('availability' ,'Disponibilité'),
            AssociationField::new('brandCar', 'Marque'),
            AssociationField::new('categorieCar', 'Type'),
            AssociationField::new('engineCar', 'Motorisation'),
            AssociationField::new('seatCar', 'N° de siège'),
            ImageField::new('image')
                // ->setFormType(VichImageType::class, array(
                //     'required' => false,
                //     'allow_delete' => true, // not mandatory, default is true
                //     'download_link' => true, // not mandatory, default is true
                //     ))
                ->setLabel('Image')
                ->setUploadDir('public/assets/image')
                ->setBasePath('public/assets/image'),

            // ImageField::new('imageFile')
            // ->setBasePath("public/assets/image")
            // ->setLabel('Image'),
            // TextEditorField::new('description'),
        ];
    }
}
