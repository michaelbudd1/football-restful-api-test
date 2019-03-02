<?php
declare(strict_types=1);

namespace App\Football\Team\Models;

use App\Entity\Team as TeamEntity;
use App\Football\Team\Exceptions\IllegalTeamName;
use App\Football\Team\Models\Interfaces\Strip as StripInterface;
use App\Football\Team\Models\Interfaces\Team as TeamInterface;
use App\Football\Team\Models\Interfaces\TeamId as TeamIdInterface;
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
     * @var TeamIdInterface
     */
    private $teamId;

    /**
     * @param TeamIdInterface   $teamId
     * @param TeamNameInterface $teamName
     * @param Strip             $strip
     */
    public function __construct(TeamIdInterface $teamId, TeamNameInterface $teamName, Strip $strip)
    {
        $this->teamName = $teamName;
        $this->strip    = $strip;
        $this->teamId = $teamId;
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
     * @inheritdoc
     */
    public function teamId(): TeamIdInterface
    {
        return $this->teamId;
    }

    /**
     * {@inheritdoc}
     *
     * @throws IllegalTeamName
     */
    public static function fromRequest(Request $request): TeamInterface
    {
        return new static (
            new NullTeamId(),
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
            'id'        => $this->teamId->toInt(),
            'team_name' => $this->teamName->toString(),
            'strip'     => $this->strip->toString()
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @throws IllegalTeamName
     */
    public static function fromEntity(TeamEntity $team): TeamInterface
    {
        return new static(
            new TeamId($team->getId()),
            new TeamName($team->getName()),
            new Strip($team->getStrip())
        );
    }

    /**
     * @param TeamIdInterface $teamId
     *
     * @return TeamInterface
     */
    public function cloneWithId(TeamIdInterface $teamId): TeamInterface
    {
        return new static(
            $teamId,
            $this->teamName,
            $this->strip
        );
    }
}
