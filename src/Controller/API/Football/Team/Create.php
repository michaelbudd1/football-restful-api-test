<?php
declare(strict_types=1);

namespace App\Controller\API\Football\Team;

use App\Controller\API\APIController;
use App\Football\Team\Exceptions\IllegalTeamName;
use App\Football\Team\Models\Team;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Create extends APIController
{
    /**
     * @Route("/api/v1/football/teams", name="create_football_team", methods={"POST"})
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        try {
            $footballTeam = Team::fromRequest($request);
            $userId       = $this->userId($request);

            $teamId = $this->footballTeamService->storeTeam($footballTeam, $userId);

            $footballTeam = $footballTeam->cloneWithId($teamId);
        } catch (IllegalTeamName $exception) {
            return new Response($exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($footballTeam->toArray());
    }
}
