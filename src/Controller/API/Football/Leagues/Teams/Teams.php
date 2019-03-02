<?php
declare(strict_types=1);

namespace App\Controller\API\Football\Leagues\Teams;

use App\Controller\API\APIController;
use App\Football\League\LeagueId;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

final class Teams extends APIController
{
    /**
     * @Route("/api/v1/football/leagues/{leagueId<\d+>}/teams", name="fetch_all_teams_in_league", methods={"GET"})
     *
     * @param LeagueId $leagueId
     *
     * @ParamConverter("leagueId", class="App\Football\League\LeagueId", converter="league_id_converter")

     * @return Response
     */
    public function index(LeagueId $leagueId)
    {
        return new JsonResponse(
            $this->footballTeamService
                 ->teamsInLeague($leagueId)
                 ->toArray()
        );
    }
}