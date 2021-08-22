<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture
{
    const Statuselts = [
      "debut",
      "encours",
      "termine",
      "echec"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::Statuselts as $statuselt){
            $status = New Status;
            $status->setDescription($statuselt);
            $manager->persist($status);
            $this->addReference($statuselt,$status);
        }

        $manager->flush();
    }
}
