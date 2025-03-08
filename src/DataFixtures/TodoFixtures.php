<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Todo;
use Faker\Factory;

class TodoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();


        for ($i = 0; $i < 10; $i++) {
            $todo = new Todo();
            $todo->setTitle($faker->sentence());
            $todo->setDone($faker->boolean());
            $manager->persist($todo);

        }

        $manager->flush();
    }
}
