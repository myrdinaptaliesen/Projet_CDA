<?php

namespace App\Controller\Admin;

use App\Entity\Clubs;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClubsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Clubs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nameClub', 'Nom du club'),
            ImageField::new('logoClub','Logo du club')
                ->setBasePath('uploads\logosClubs')
                ->setUploadDir('public\uploads\logosClubs'),
        ];
    }
    
}
