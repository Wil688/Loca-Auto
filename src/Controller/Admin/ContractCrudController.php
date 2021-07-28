<?php

namespace App\Controller\Admin;

use App\Entity\Contract;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ContractCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contract::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         // IdField::new('id'),
    //         // TextField::new('title'),
    //         AssociationField::new('userContract'),
    //         AssociationField::new('carContract'),
    //     ];
    // }
    
}
