<?php
declare(strict_types=1);

namespace App\Football\Team\Models;

use App\Entity\Team as TeamEntity;
use App\Football\Team\Exceptions\IllegalTeamName;
use App\Football\Team\Models\Interfaces\Strip as StripInterface;
use App\Football\Team\Models\Interfaces\Team as TeamInterface;
use App\Football\Team\Models\Interfaces\TeamName as TeamNameInterface;
use Symfony\Component\HttpFoundation\Request;

final class Team implements TeamInterface
{
    /**
     * @var TeamNameInterface
     */
    private $teamName;

    /**
     * @var Strip
     */
    private $strip;

    /**
     * @param TeamNameInterface $teamName
     * @param Strip             $strip
     */
    public function __construct(TeamNameInterface $teamName, Strip $strip)
    {
        $this->teamName = $teamName;
        $this->strip    = $strip;
    }

    /**
     * {@inheritdoc}
     */
    public function strip(): StripInterface
    {
        return $this->strip;
    }

    /**
     * {@inheritdoc}
     */
    public function teamName(): TeamNameInterface
    {
        return $this->teamName;
    }

    /**
     * {@inheritdoc}
     *
     * @throws IllegalTeamName
     */
    public static function fromRequest(Request $request): TeamInterface
    {
        return new static (
            new TeamName($request->get('teamName')),
            new Strip($request->get('strip'))
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'team_name' => $this->teamName->toString(),
            'strip'     => $this->strip->toString()
        ];
    }

    /**
     * @param TeamEntity $team
     *
     * @return TeamInterface
     *
     * @throws IllegalTeamName
     */
    public static function fromEntity(TeamEntity $team): TeamInterface
    {
        return new static(
            new TeamName($team->getName()),
            new Strip($team->getStrip())
        );
    }
}