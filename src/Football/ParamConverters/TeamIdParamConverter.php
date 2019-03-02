<?php
declare(strict_types=1);

namespace App\Football\ParamConverters;

use App\Football\League\LeagueId;
use App\Football\Team\Models\TeamId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

final class TeamIdParamConverter implements ParamConverterInterface
{
    private const PARAM_NAME = 'teamId';

    /**
     * @param Request        $request
     * @param ParamConverter $configuration Contains the name, class and options of the object
     *
     * @return void True if the object has been successfully set, else false
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        $teamId = new TeamId((int) $request->attributes->get('teamId'));

        $request->attributes->set($configuration->getName(), $teamId);
    }

    /**
     * @param ParamConverter $configuration
     *
     * @return bool
     */
    public function supports(ParamConverter $configuration)
    {
        if ($configuration->getName() === static::PARAM_NAME) {
            return true;
        }

        return false;
    }
}
