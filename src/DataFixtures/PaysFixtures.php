<?php

namespace App\DataFixtures;

use App\Entity\Pays;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PaysFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1; $i<=10; $i++){
            $pays = new Pays();
            $pays->setNomPays("Pays n°$i")
                 ->setNomCardinale("Cardinal n°$i")
                 ->setCreatedAt(new \DateTime());
            $manager->persist($pays);
        }
        $manager->flush();
    }
}
