<?php

namespace App\Controller\Admin;

use App\Entity\Hideouts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HideoutsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hideouts::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('code'),
            TextField::new('address'),
            AssociationField::new('type')
        ];
    }

}
