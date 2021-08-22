<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\HideoutsType;

class HideoutsTypeFixtures extends Fixture
{
    const hideoutsTypes = [
        'hut',
        'house',
        'castle'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::hideoutsTypes as $hideoutsType) {
            $hideoutsTypeDescription = new HideoutsType();
            $hideoutsTypeDescription->setDescription($hideoutsType);
            $this->addReference($hideoutsType,$hideoutsTypeDescription);
            $manager->persist($hideoutsTypeDescription);
        }

        $manager->flush();
    }
}
