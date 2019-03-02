<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\League;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

final class LeagueFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $team = new Team();

        $team->setName('Leicester City');
        $team->setStrip('Blue and White');
        $team->setUserId(1);

        $team2 = new Team();

        $team2->setName('Manchester United');
        $team2->setStrip('Red');
        $team2->setUserId(1);

        $team3 = new Team();

        $team3->setName('Arsenal');
        $team3->setStrip('Red and White');
        $team3->setUserId(1);

        $manager->persist($team);
        $manager->persist($team2);
        $manager->persist($team3);

        $manager->flush();

        $league = new League();
        $league->setName('Barclay\'s Premier League');

        $league->getTeams()->add($team);
        $league->getTeams()->add($team2);
        $league->getTeams()->add($team3);

        $manager->persist($league);
        $manager->flush();
    }
}
