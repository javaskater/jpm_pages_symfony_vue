<?php

namespace App\DataFixtures;

use App\Entity\JpmDiplom;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DiplomFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $diplom = new JpmDiplom();
        $diplom->setSchoolName("Ecole Centrale de Lille");
        $diplom->setUrl("http");
        $manager->persist($diplom);

        $manager->flush();
    }
}
