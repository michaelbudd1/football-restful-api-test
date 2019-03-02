<?php
declare(strict_types=1);

namespace App\Tests;

use App\Football\Team\Models\Team;
use App\Football\Team\Models\Strip;
use App\Football\Team\Models\TeamName;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

final class FootballTeamTest extends TestCase
{
    private const TEST_TEAM_NAME = 'Leicester City';
    private const TEST_STRIP     = 'Blue and White';

    /**
     * @test
     *
     * @expectedException \App\Football\Team\Exceptions\IllegalTeamName
     */
    public function testTeamNameCannotBeCreatedWithEmptyString(): void
    {
        new TeamName('');
    }

    /**
     * @test
     *
     * @throws \App\Football\Team\Exceptions\IllegalTeamName
     */
    public function testItCanCreateTeamNameWithNonEmptyString(): void
    {
        $teamNameObject = new TeamName(static::TEST_TEAM_NAME);

        $this->assertEquals(static::TEST_TEAM_NAME, $teamNameObject->toString());
    }

    /**
     * @throws \App\Football\Team\Exceptions\IllegalTeamName
     */
    public function testItCanCreateATeam(): void
    {
        $footballTeam = new Team(
            new TeamName(static::TEST_TEAM_NAME),
            new Strip(static::TEST_STRIP)
        );

        $this->assertEquals($footballTeam->strip()->toString(), static::TEST_STRIP);
        $this->assertEquals($footballTeam->teamName()->toString(), static::TEST_TEAM_NAME);
    }
}