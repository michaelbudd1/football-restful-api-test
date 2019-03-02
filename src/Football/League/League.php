<?php
declare(strict_types=1);

namespace App\Football\League;

use App\Football\League\Interfaces\League as LeagueInterface;
use App\Football\League\Interfaces\LeagueName;

final class League implements LeagueInterface
{
    /**
     * @var LeagueName
     */
    private $leagueName;

    /**
     * @param LeagueName $leagueName
     */
    public function __construct(LeagueName $leagueName)
    {
        $this->leagueName = $leagueName;
    }

    /**
     * {@inheritdoc}
     */
    public function name(): LeagueName
    {
        return $this->leagueName;
    }
}