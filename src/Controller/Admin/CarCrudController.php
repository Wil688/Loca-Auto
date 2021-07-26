<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
        
            TextField::new('plate' ,'Plaque d\'immatriculation'),
            AssociationField::new('brandCar' ,'Marque'),
            // TextField::new('plate' ,'Plaque d\'immatriculation'),
            // TextField::new('plate' ,'Plaque d\'immatriculation'),
            // TextEditorField::new('description'),
        ];
    }

}