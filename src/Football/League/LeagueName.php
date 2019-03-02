<?php
declare(strict_types=1);

namespace App\Football\League;

use App\Football\League\Exceptions\IllegalLeagueName;
use App\Football\League\Interfaces\LeagueName as LeagueNameInterface;

final class LeagueName implements LeagueNameInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     *
     * @throws IllegalLeagueName
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
     * @throws IllegalLeagueName
     */
    private function guard(string $name): void
    {
        if (empty($name)) {
            throw IllegalLeagueName::leagueNameCannotBeEmpty();
        }
    }
}