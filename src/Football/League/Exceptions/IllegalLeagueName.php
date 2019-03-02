<?php
declare(strict_types=1);

namespace App\Football\League\Exceptions;

final class IllegalLeagueName extends \Exception
{
    private const LEAGUE_NAME_CANNOT_BE_EMPTY = 'League name cannot be empty';

    /**
     * @return IllegalLeagueName
     */
    public static function leagueNameCannotBeEmpty(): IllegalLeagueName
    {
        return new static(static::LEAGUE_NAME_CANNOT_BE_EMPTY);
    }
}
