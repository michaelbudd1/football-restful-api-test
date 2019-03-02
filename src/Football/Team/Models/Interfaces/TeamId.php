<?php
declare(strict_types=1);

namespace App\Football\Team\Models\Interfaces;

interface TeamId
{
    /**
     * @return int
     */
    public function toInt(): int;
}
