<?php

namespace App\Controller\Admin;

use App\Entity\CyclistsCategories;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CyclistsCategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CyclistsCategories::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nameCylistsCategory','Nom de la catégorie'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/new', 'cyclistsCategories/new.html.twig')
            ->overrideTemplate('crud/index', 'cyclistsCategories/index.html.twig')
            ->overrideTemplate('crud/edit', 'cyclistsCategories/edit.html.twig')

        ;
    }
    
}
