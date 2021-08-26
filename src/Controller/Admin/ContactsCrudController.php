<?php

namespace App\Controller\Admin;

use App\Entity\Contacts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contacts::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastName'),
            TextField::new('firstName'),
            DateField::new('birthdate'),
            NumberField::new('codeName'),
            TextField::new('nationality'),
            AssociationField::new('Missions')
        ];
    }

}
