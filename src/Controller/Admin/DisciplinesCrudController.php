<?php

namespace App\Controller\Admin;

use App\Entity\Disciplines;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DisciplinesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Disciplines::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nameDiscipline','Nom de la discipline'),
        ];
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/new', 'disciplines/new.html.twig')
            ->overrideTemplate('crud/index', 'disciplines/index.html.twig')
            ->overrideTemplate('crud/edit', 'disciplines/edit.html.twig')

        ;
    }
}
