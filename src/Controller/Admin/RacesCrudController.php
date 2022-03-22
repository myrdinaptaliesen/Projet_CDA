<?php

namespace App\Controller\Admin;

use App\Entity\Races;

use App\Form\DocumentsFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\Admin\DocumentsCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
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
            AssociationField::new('discipline', 'Discipline concernée')->autocomplete(),
            TextField::new('titleRace','Nom de la compétition'),
            AssociationField::new('cyclistsCategories', 'Catégorie'),
            AssociationField::new('club', 'Club organisateur')->autocomplete(),
            AssociationField::new('city', 'Ville')->autocomplete(),
            DateTimeField::new('startDateRace', 'Date de la compétition'),
            DateField::new('endDateRace', 'Date de fin de la compétition'),
            NumberField::new('distanceRace', 'Distance de la course')
                ->setNumDecimals(2),
            NumberField::new('distanceCircuit', 'Distance circuit')
                ->setNumDecimals(2),
            MoneyField::new('commitmentFeeRace', 'Prix d\'engagement')
                ->setCurrency('EUR'),
            TextField::new('departureAdress','Adresse du départ'),
            TextField::new('informationsRace','Informations'),
            // ImageField::new('organizationalDetails','Détails d\'organisation')
            //     ->setBasePath('uploads\details')
            //     ->setUploadDir('public\uploads\details'),
            UrlField::new('organizationalDetails','Détails d\'organisation'),
            DateTimeField::new('updatedAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),

        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Races) return;

        $entityInstance->setCreatedAt(new \DateTimeImmutable);

        parent::persistEntity($em, $entityInstance);
    }
}
