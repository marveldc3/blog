namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence(6, true));
            $article->setContent($faker->paragraphs(5, true));
            $article->setCreatedAt($faker->dateTimeBetween('-1 year'));
            $article->setUpdatedAt($faker->dateTimeBetween('-1 year'));
            $article->setIsPremium($faker->boolean());
            $article->setAuthor($faker->name());

            $manager->persist($article);
        }

        $manager->flush();
    }
}