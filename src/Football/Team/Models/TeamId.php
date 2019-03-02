<?php
declare(strict_types=1);

namespace App\Football\Team\Models;

use App\Football\Team\Models\Interfaces\TeamId as TeamIdInterface;

final class TeamId implements TeamIdInterface
{
    /**
     * @var int
     */
    private $teamId;

    /**
     * @param int $teamId
     */
    public function __construct(int $teamId)
    {
        $this->teamId = $teamId;
    }

    /**
     * @return int
     */
    public function toInt(): int
    {
        return $this->teamId;
    }
}
