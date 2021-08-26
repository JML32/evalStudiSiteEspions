<?php

namespace App\Controller\Admin;

use App\Entity\Specialities;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SpecialitiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Specialities::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('description'),
            AssociationField::new('Agents'),
            // todo : revoir AssociationField::new('Missions') -> generation d'une erreur
            //AssociationField::new('Missions'),
        ];
    }

}
