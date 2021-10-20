<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    
        $i = mt_rand(0, 2);
        for($i=1; $i <= 20 ;$i++){
            $faker = Factory::create("fr-FR");

            $contact = new Contact();
            $contact->setNom($faker->name(6))
                    ->setPrenom($faker->lastname(6))
                    ->setAdresse($faker->sentence(6))
                    ->setCodePostal(mt_rand(1000, 8000))
                    ->setVille($faker->city(6))
                    ->setNumTel(mt_rand())
                    ->setAdresseMail($faker->email(9))
                    ->setAvatar($faker->imageurl(1000, 350))
                    ->setCatego($categories[$i]);
                $manager->persist($contact);
        }
        $categorie1 = new Categorie();
        $categorie1->setDesignation('amis');
        $manager->persist($categorie1);
        $categorie2 = new Categorie();
        $categorie2->setDesignation('professionnels');
        $manager->persist($categorie2);
        $categorie3 = new Categorie();
        $categorie3->setDesignation('connaissances');
        $manager->persist($categorie3);

        $categories=[$categorie1, $categorie2, $categorie3];
      
        $faker = Factory::create('fr-FR');
    //Nous géron les annonces

        $manager->flush();
    }
}
