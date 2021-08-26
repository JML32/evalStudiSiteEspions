<?php

namespace App\Controller\Admin;

use App\Entity\Targets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TargetsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Targets::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastname'),
            TextField::new('firstName'),
            DateField::new('birthdate'),
            TextField::new('codeName'),
            TextField::new('nationality'),
            AssociationField::new('Missions')
        ];
    }

}
