<?php

namespace App\Controller\Admin;

use App\Entity\Races;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RacesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Races::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('startDateRace', 'Date de la compétition'),
            DateField::new('endDateRace', 'Date de fin de la compétition'),
            NumberField::new('distanceRace', 'Distance de la course')
                ->setNumDecimals(2),
            NumberField::new('distanceCircuit', 'Distance circuit')
                ->setNumDecimals(2),
            MoneyField::new('commitmentFeeRace', 'Prix d\'engagement')
                ->setCurrency('EUR'),
            AssociationField::new('city','Ville'),
            AssociationField::new('club','Club organisateur')
            ->autocomplete(),
            AssociationField::new('cyclistsCategories','Catégorie')
            ->autocomplete(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),

        ];
    }
}
