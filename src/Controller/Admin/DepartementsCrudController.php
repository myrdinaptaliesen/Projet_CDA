<?php

namespace App\Controller\Admin;

use App\Entity\Departements;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DepartementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Departements::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('codeDepartement','Code du département'),
            TextField::new('nameDepartement', 'Nom du département'),
        ];
    }
    
}
