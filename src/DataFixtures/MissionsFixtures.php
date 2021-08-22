<?php

namespace App\DataFixtures;

use App\Entity\Status;
use App\Entity\Targets;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Missions;
use App\Entity\Agents;
use App\Entity\Contacts;

class MissionsFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager)
    {
            // initialisation de l'objet Faker
            $faker = Faker::create('fr_FR');

            // targets creation
            $targets = [];
            for ($i = 0; $i < 20; $i++) {
                $targets[$i] = new Targets();
                $targets[$i]->setFirstName($faker->firstname())
                    ->setLastName($faker->lastname())
                    ->setBirthdate($faker->dateTimeBetween('-45 years', '-18 years'))
                    ->setCodeName($faker->randomNumber(4, true))
                    ->setNationality($faker->country)
                ;
                $manager->persist($targets[$i]);
            }

            // agents creation
            $agents = [];
            for ($i = 0; $i < 20; $i++) {
                $agents[$i] = new Agents();
                $agents[$i]->setFirstName($faker->firstname())
                    ->setLastName($faker->lastname())
                    ->setBirthdate($faker->dateTimeBetween('-45 years', '-18 years'))
                    ->setIdentificationId($faker->randomNumber(6, true))
                    ->setNationality($faker->country)
                ;
                $manager->persist($agents[$i]);
            }

            // contacts creation
            $contacts = [];
            for ($i = 0; $i < 20; $i++){
                $contacts[$i] = new Contacts();
                $contacts[$i]->setFirstName($faker->firstName)
                    ->setLastName($faker->lastName)
                    ->setBirthdate($faker->dateTimeBetween('-50 years', '-20 years'))
                    ->setCodeName($faker->randomNumber(4,true))
                    ->setNationality($faker->country)
                ;
                $manager->persist($contacts[$i]);
            }


            // missions creation
            $missions = [];
            for ($k = 0; $k < 15; $k++) {
                $missions[$k] = new Missions();
                $missions[$k]->setTitle($faker->word())
                    ->setDescription($faker->sentence())
                    ->setCodeName('Mission ' . $faker->randomNumber(2, true))
                    ->setCountry($faker->country())
                    ->setMissionType($this->getReference(MissionTypeFixtures::missionTypes[rand(0, 3)]))
                    ->setBeginAt($faker->dateTimeBetween('-3 years', '-2 years'))
                    ->setEndedAt($faker->dateTimeBetween('-1 year', 'now'));

                // include targets in missions instances
                // get a random number of targets in an array
                $randomTargets = (array)array_rand($targets, rand(1, count($targets)));
                // and add those targets to each mission
                foreach ($randomTargets as $key => $value) {
                    $missions[$k]->addTarget($targets[$key]);
                }


                // include agents in missions instances
                // get a random number of agents in an array
                $randomAgents = (array)array_rand($agents, rand(1, count($agents)));
                // and add those agents to each mission
                foreach ($randomAgents as $key => $value) {
                    $missions[$k]->addAgent($agents[$key]);
                }

                // include contacts in missions instances
                // get a random number of contacts in a array
                $randomContacts = (array)array_rand($contacts, rand(1, count($contacts)));
                // and add those agents to each mission
                foreach ($randomContacts as $key => $value) {
                    $missions[$k]->addContact($contacts[$key]);
                }

                // include a status for each mission
                $statusDescription = StatusFixtures::Statuselts;
                $randomStatus = $statusDescription[rand(0,count($statusDescription)-1)];
                $missions[$k]->setStatus($this->getReference($randomStatus));


                $manager->persist($missions[$k]);
            }

            $manager->flush();
        }

        public function getDependencies()
        {
            return [
              StatusFixtures::class,
            ];
        }
}
