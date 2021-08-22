<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Specialities;

class SpecialitiesFixtures extends Fixture
{
    const specialities = [
        "knife fight specialist",
        "gun sniper",
        "intelligence specialist",
        "car driving specialist",
        "diving specialist",
        "plane pilot",
        "helicopter pilot"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::specialities as $speciality){
            $specialityDescription = new Specialities();
            $specialityDescription->setDescription($speciality);
            $manager->persist($specialityDescription);
            $this->addReference($speciality, $specialityDescription);
    }
        $manager->flush();
    }
}
