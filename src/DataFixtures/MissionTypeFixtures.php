<?php

namespace App\DataFixtures;

use App\Entity\MissionType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class MissionTypeFixtures extends Fixture
{
    const missionTypes = [
        'surveillance',
        'murder',
        'infiltration',
        'intelligence'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::missionTypes as $missionType) {
            $missionTypeDescription = new MissionType();
            $missionTypeDescription->setDescription($missionType);
            $this->addReference($missionType, $missionTypeDescription);
            $manager->persist($missionTypeDescription);
        }

        $manager->flush();
    }
}
