<?php

namespace App\DataFixtures;

use App\Entity\JpmDiplom;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DiplomFixtures extends Fixture
{
    
    public function load(ObjectManager $manager): void
    {
        
        $format = 'd/m/Y';
        $begin_date_str = '01/09/1988';
        $end_date_str = '01/09/1991';
        
        $diplom = new JpmDiplom();
        $diplom->setSchoolName("Ecole Centrale de Lille");
        $diplom->setUrl("https://centralelille.fr/");
        $diplom->setBeginDate(DateTime::createFromFormat($format, $begin_date_str));
        $diplom->setEndDate(DateTime::createFromFormat($format, $end_date_str));
        $diplom->setLanguage('fr_FR');
        $diplom->setCursusDescription('Ecole d\'ingénieurs Généraliste du Concours Centrale anciennement IDN');
        $manager->persist($diplom);

        $diplom = new JpmDiplom();
        $diplom->setSchoolName("Ecole Centrale de Lille");
        $diplom->setUrl("https://centralelille.fr/en/");
        $diplom->setBeginDate(DateTime::createFromFormat($format, $begin_date_str));
        $diplom->setEndDate(DateTime::createFromFormat($format, $end_date_str));
        $diplom->setLanguage('en_EN');
        $diplom->setCursusDescription('General Enginnering School training top level engineers accessible though competitive exam after two years highscool');
        $manager->persist($diplom);

        $diplom = new JpmDiplom();
        $diplom->setSchoolName("Ecole Centrale de Lille");
        $diplom->setUrl("https://centralelille.fr/en/");
        $diplom->setBeginDate(DateTime::createFromFormat($format, $begin_date_str));
        $diplom->setEndDate(DateTime::createFromFormat($format, $end_date_str));
        $diplom->setLanguage('de_DE');
        $diplom->setCursusDescription('Ingenieur Hochschule sogennante <i>Grande Ecole</i> fûr allgemeine Ingenieur Asubildiung');
        $manager->persist($diplom);

        $begin_date_str = '01/09/1990';
        $end_date_str = '01/09/1991';

        $diplom = new JpmDiplom();
        $diplom->setSchoolName("Université Lille 1");
        $diplom->setUrl("https://www.univ-lille.fr/");
        $diplom->setBeginDate(DateTime::createFromFormat($format, $begin_date_str));
        $diplom->setEndDate(DateTime::createFromFormat($format, $end_date_str));
        $diplom->setLanguage('fr_FR');
        $diplom->setCursusDescription('DEA de Génie Electrique');
        $manager->persist($diplom);

        $diplom = new JpmDiplom();
        $diplom->setSchoolName("University of Lille");
        $diplom->setUrl("https://www.univ-lille.fr/en/");
        $diplom->setBeginDate(DateTime::createFromFormat($format, $begin_date_str));
        $diplom->setEndDate(DateTime::createFromFormat($format, $end_date_str));
        $diplom->setLanguage('en_EN');
        $diplom->setCursusDescription('pre PHD diplom in Electrical Engineering');
        $manager->persist($diplom);

        $diplom = new JpmDiplom();
        $diplom->setSchoolName("Lille Universität");
        $diplom->setUrl("https://www.univ-lille.fr/en/");
        $diplom->setBeginDate(DateTime::createFromFormat($format, $begin_date_str));
        $diplom->setEndDate(DateTime::createFromFormat($format, $end_date_str));
        $diplom->setLanguage('de_DE');
        $diplom->setCursusDescription('Pre Doktorant Diplom in Elektrotechnik');
        $manager->persist($diplom);

        $manager->flush();
    }
}
