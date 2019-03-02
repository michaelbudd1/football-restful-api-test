<?php
declare(strict_types=1);

namespace App\Football\Services\Interfaces;

use App\Football\Interfaces\UserId;
use App\Football\League\Interfaces\LeagueId;
use App\Football\Team\Models\Interfaces\Team;
use App\Football\Team\Models\Interfaces\TeamId;
use Doctrine\Common\Collections\Collection;

interface FootballTeamService
{
    /**
     * @param Team   $team
     * @param UserId $userId
     *
     * @return TeamId
     */
    public function storeTeam(Team $team, UserId $userId): TeamId;

    /**
     * @param LeagueId $leagueId
     *
     * @return Collection
     */
    public function teamsInLeague(LeagueId $leagueId): Collection;

    /**
     * @param TeamId $teamId
     * @param Team   $team
     * @param UserId $userId
     *
     * @return void
     */
    public function updateTeam(TeamId $teamId, Team $team, UserId $userId): void;

    /**
     * @param LeagueId $leagueId
     */
    public function deleteLeague(LeagueId $leagueId): void;
}
