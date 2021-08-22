<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;
use App\Entity\Hideouts;

class HideoutsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<20; $i++){
            $hideouts = New Hideouts;
            $faker = Faker::create();
            $hideouts->setCode($faker->randomNumber(3,true));
            $hideouts->setAddress($faker->address());
            $hideouts->setType($this->getReference(HideoutsTypeFixtures::hideoutsTypes[rand(0,2)]));
            $manager->persist($hideouts);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          HideoutsTypeFixtures::class,
        ];
    }
}
