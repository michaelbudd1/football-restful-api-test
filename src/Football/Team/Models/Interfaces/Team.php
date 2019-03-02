<?php
declare(strict_types=1);

namespace App\Football\Team\Models\Interfaces;

use App\Entity\Team as TeamEntity;
use Symfony\Component\HttpFoundation\Request;

interface Team
{
    /**
     * @return Strip
     */
    public function strip(): Strip;

    /**
     * @return TeamName
     */
    public function teamName(): TeamName;

    /**
     * @param Request $request
     *
     * @return Team
     */
    public static function fromRequest(Request $request): Team;

    /**
     * @param TeamEntity $team
     *
     * @return Team
     */
    public static function fromEntity(TeamEntity $team): Team;

    /**
     * @return array
     */
    public function toArray(): array;
}