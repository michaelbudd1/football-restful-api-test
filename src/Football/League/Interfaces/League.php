<?php
declare(strict_types=1);

namespace App\Football\League\Interfaces;

interface League
{
    /**
     * @return LeagueName
     */
    public function name(): LeagueName;
}
