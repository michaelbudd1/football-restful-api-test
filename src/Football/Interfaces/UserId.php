<?php
declare(strict_types=1);

namespace App\Football\Interfaces;

interface UserId
{
    /**
     * @return integer
     */
    public function toInt(): int;
}