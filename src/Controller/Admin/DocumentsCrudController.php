<?php

namespace App\Controller\Admin;

use App\Entity\Documents;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DocumentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Documents::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
