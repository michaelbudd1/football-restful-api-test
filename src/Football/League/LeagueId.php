<?php
declare(strict_types=1);

namespace App\Football\League;

use App\Football\League\Interfaces\LeagueId as LeagueIdInterface;

final class LeagueId implements LeagueIdInterface
{
    /**
     * @var int
     */
    private $leagueId;

    /**
     * @param int $leagueId
     */
    public function __construct(int $leagueId)
    {
        $this->leagueId = $leagueId;
    }

    /**
     * @return int
     */
    public function toInt(): int
    {
        return $this->leagueId;
    }
}