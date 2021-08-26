<?php

namespace App\Controller\Admin;

use App\Entity\HideoutsType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HideoutsTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HideoutsType::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('description'),
        ];
    }

}
