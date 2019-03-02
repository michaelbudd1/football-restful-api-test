<?php
declare(strict_types=1);

namespace App\Tests;

use App\Football\League\LeagueName;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

final class LeagueTest extends TestCase
{
    /**
     * @test
     *
     * @expectedException App\Football\League\Exceptions\IllegalLeagueName
     */
    public function testItCannotCreateALeagueNameWithEmptyString(): void
    {
        new LeagueName('');
    }

    /**
     * @test
     *
     * @throws \App\Football\League\Exceptions\IllegalLeagueName
     */
    public function testItCanCreateALeagueNameWithNonEmptyString(): void
    {
        $leagueNameString = 'Premier League';

        $leagueName = new LeagueName($leagueNameString);

        $this->assertEquals($leagueNameString, $leagueName->toString());
    }
}