<?php

namespace App\Controller\Admin;

use App\Entity\Missions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MissionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Missions::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('description'),
            TextField::new('codeName'),
            TextField::new('country'),
            AssociationField::new('status'),
            AssociationField::new('Agents'),
            AssociationField::new('Targets'),
            AssociationField::new('contacts'),
            AssociationField::new('hideouts'),
            AssociationField::new('missionType'),
            AssociationField::new('requiredSpecialities'),
            DateField::new('begin_At'),
            DateField::new('ended_At'),
        ];
    }

}
