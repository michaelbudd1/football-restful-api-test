<?php
declare(strict_types=1);

namespace App\Football\Team\Models;

use App\Football\Team\Exceptions\IllegalTeamName;
use App\Football\Team\Models\Interfaces\TeamName as TeamNameInterface;

final class TeamName implements TeamNameInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     *
     * @throws IllegalTeamName
     */
    public function __construct(string $name)
    {
        $this->guard($name);

        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @throws IllegalTeamName
     */
    private function guard(string $name): void
    {
        if (empty($name)) {
            throw IllegalTeamName::teamNameCannotBeEmpty();
        }
    }
}