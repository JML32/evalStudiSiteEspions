<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Targets;
use Faker\Factory as Faker;


class TargetsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<20; $i++){
            $target = New Targets;
            $faker = Faker::create();
            $target->setFirstName($faker->firstName);
            $target->setLastName($faker->lastName);
            $target->setCodeName($faker->randomNumber(4,true));
            $target->setBirthdate($faker->dateTimeBetween('-50 years', '-18 years'));
            $target->setNationality($faker->country());
            $this->addReference('$target_'.$i, $target);
            $manager->persist($target);
        }
        
        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
