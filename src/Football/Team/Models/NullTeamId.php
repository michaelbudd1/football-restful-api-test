<?php
declare(strict_types=1);

namespace App\Football\Team\Models;

use App\Football\Team\Models\Interfaces\TeamId;

final class NullTeamId implements TeamId
{
    /**
     * @return int
     */
    public function toInt(): int
    {
        return 0;
    }
}
