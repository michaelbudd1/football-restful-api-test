<?php
declare(strict_types=1);

namespace App\Controller\API\Football\Team;

use App\Controller\API\APIController;
use App\Football\Team\Exceptions\IllegalTeamName;
use App\Football\Team\Models\Interfaces\TeamId;
use App\Football\Team\Models\Team;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Update extends APIController
{
    /**
     * @Route("/api/v1/football/teams/{teamId<\d+>}", name="update_football_team", methods={"PUT"})
     *
     * @param Request $request
     * @param TeamId  $teamId
     *
     * @return Response
     */
    public function index(Request $request, TeamId $teamId)
    {
        try {
            $footballTeam = Team::fromRequest($request);
            $footballTeam = $footballTeam->cloneWithId($teamId);

            $userId       = $this->userId($request);

            $this->footballTeamService->updateTeam($teamId, $footballTeam, $userId);
        } catch (IllegalTeamName $exception) {
            return new Response($exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($footballTeam->toArray());
    }
}
