<?php
namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence(6, true));
            $article->setContent($faker->paragraphs(5, true));
            $article->setCreatedAt(new \DateTimeImmutable($faker->dateTimeBetween('-1 year')->format('Y-m-d H:i:s')));
            $article->setUpdatedAt(new \DateTimeImmutable($faker->dateTimeBetween('-1 year')->format('Y-m-d H:i:s')));
            $article->setPremium($faker->boolean()); 
            $article->setAuthor($faker->name());

            $manager->persist($article);
        }

        $manager->flush();
    }
}
