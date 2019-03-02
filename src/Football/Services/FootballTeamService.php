<?php
declare(strict_types=1);

namespace App\Football\Services;

use App\Entity\Team;
use App\Football\Interfaces\UserId;
use App\Football\League\Interfaces\LeagueId;
use App\Football\Services\Interfaces\FootballTeamService as FootballTeamServiceInterface;
use App\Football\Team\Models\Interfaces\Team as TeamInterface;
use App\Football\Team\Models\Interfaces\TeamId;
use App\Football\Team\Models\Team as TeamModel;
use App\Repository\LeagueRepository;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

final class FootballTeamService implements FootballTeamServiceInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var LeagueRepository
     */
    private $leagueRepository;

    /**
     * @var TeamRepository
     */
    private $teamRepository;

    /**
     * @param EntityManagerInterface $entityManager
     * @param LeagueRepository       $leagueRepository
     * @param TeamRepository         $teamRepository
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        LeagueRepository $leagueRepository,
        TeamRepository $teamRepository
    ) {
        $this->entityManager = $entityManager;
        $this->leagueRepository = $leagueRepository;
        $this->teamRepository = $teamRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function storeTeam(TeamInterface $teamModel, UserId $userId): void
    {
        $team = new Team();

        $team->setName($teamModel->teamName()->toString());
        $team->setStrip($teamModel->strip()->toString());
        $team->setUserId($userId->toInt());

        $this->entityManager->persist($team);
        $this->entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function teamsInLeague(LeagueId $leagueId): Collection
    {
        return $this->leagueRepository
            ->find($leagueId->toInt())
            ->getTeams()
            ->map(function (Team $team) {
                return TeamModel::fromEntity($team)->toArray();
            });
    }

    /**
     * {@inheritdoc}
     */
    public function updateTeam(TeamId $teamId, TeamInterface $team, UserId $userId): void
    {
        $teamEntity = $this->teamRepository->find($teamId->toInt());

        $teamEntity->setName($team->teamName()->toString());
        $teamEntity->setStrip($team->strip()->toString());

        $this->entityManager->persist($teamEntity);
        $this->entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function deleteLeague(LeagueId $leagueId): void
    {
        $leagueEntity = $this->leagueRepository->find($leagueId->toInt());

        $this->entityManager->remove($leagueEntity);
        $this->entityManager->flush();
    }
}