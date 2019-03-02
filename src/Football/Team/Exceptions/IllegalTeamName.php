<?php
declare(strict_types=1);

namespace App\Football\Team\Exceptions;

final class IllegalTeamName extends \Exception
{
    private const TEAM_NAME_CANNOT_BE_EMPTY = 'Team name cannot be empty';

    /**
     * @return IllegalTeamName
     */
    public static function teamNameCannotBeEmpty(): IllegalTeamName
    {
        return new static(static::TEAM_NAME_CANNOT_BE_EMPTY);
    }
}
