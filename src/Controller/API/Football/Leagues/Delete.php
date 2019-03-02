<?php
declare(strict_types=1);

namespace App\Controller\API\Football\Leagues;

use App\Controller\API\APIController;
use App\Football\League\Interfaces\LeagueId;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Delete extends APIController
{
    /**
     * @Route("/api/v1/football/leagues/{leagueId<\d+>}", name="delete_league", methods={"DELETE"})
     *
     * @param LeagueId $leagueId
     *
     * @return Response
     */
    public function index(LeagueId $leagueId)
    {
        $this->footballTeamService->deleteLeague($leagueId);

        return new Response('League successfully deleted');
    }
}
