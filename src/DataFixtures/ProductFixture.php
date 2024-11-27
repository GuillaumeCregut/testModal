<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $price = $faker->randomFloat(2, 10, 300);
            $tva = $faker->randomFloat(2, 0, 100);
            $purchasePrice = $price - $faker->randomFloat(2, 0, 150);
            if ($purchasePrice < 0) {
                $purchasePrice = 0;
            }
            $product = new Product();
            $product->setDesignation($faker->text(60))
                ->setDescription($faker->paragraph(2, false))
                ->setPrice($price)
                ->setTva($tva)
                ->setPurchasePrice($purchasePrice);
            $manager->persist($product);
        }
        $manager->flush();
    }

 
}
