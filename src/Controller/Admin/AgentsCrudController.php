<?php

namespace App\Controller\Admin;

use App\Entity\Agents;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AgentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Agents::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastName'),
            TextField::new('firstName'),
            DateField::new('birthdate'),
            NumberField::new('identificationId'),
            TextField::new('nationality'),
            AssociationField::new('Specialities'),
            AssociationField::new('Missions')
        ];
    }

}
