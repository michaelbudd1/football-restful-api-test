<?php
declare(strict_types=1);

namespace App\Football\League\Interfaces;

interface LeagueId
{
    /**
     * @return int
     */
    public function toInt(): int;
}