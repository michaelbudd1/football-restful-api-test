<?php
declare(strict_types=1);

namespace App\Controller\API\Football;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Team
{
    /**
     * @Route("/api/team", name="create_football_team")
     */
    public function index()
    {
        return new Response('test');
    }
}