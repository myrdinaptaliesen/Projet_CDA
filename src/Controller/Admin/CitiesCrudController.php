<?php

namespace App\Controller\Admin;

use App\Entity\Cities;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CitiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cities::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nameCity','Nom de la ville'),
            TextField::new('postalCodeCity','Code postal de la ville'),
            TextField::new('latCity','Latitude de la ville'),
            TextField::new('lonCity','Longitude de la ville'),
            AssociationField::new('departement','Département'),
        ];
    }
    
}
