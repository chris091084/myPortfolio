<?php

namespace App\DataFixtures;

use App\Entity\DetailFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use Faker;

class AppFixtures extends Fixture
{
    protected $faker;

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=0 ; $i<3 ; $i++) {

            $formation = new Formation();
            $formation->setTitle($faker->jobTitle);
            $formation->setYear($faker->year($max = 'now'));
            $this->addReference('formation_' . $i, $formation);
            $manager->persist($formation);
        }
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=0 ; $i<4 ; $i++) {

            $detail = new DetailFormation();
            $detail->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true));

            $detail->addFormation($this->getReference('formation_'.$i));
            $manager->persist($formation);

        }


        // $manager->persist($product);

        $manager->flush();
    }
}
