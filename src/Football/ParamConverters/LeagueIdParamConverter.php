<?php
declare(strict_types=1);

namespace App\Football\ParamConverters;

use App\Football\League\Interfaces\LeagueId as LeagueIdInterface;
use App\Football\League\LeagueId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

final class LeagueIdParamConverter implements ParamConverterInterface
{
    private const PARAM_NAME = 'leagueId';

    /**
     * @param Request        $request
     * @param ParamConverter $configuration Contains the name, class and options of the object
     *
     * @return void True if the object has been successfully set, else false
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        if ($request->attributes->get('leagueId') instanceof LeagueIdInterface) {
            return;
        }

        $leagueId = new LeagueId((int) $request->attributes->get('leagueId'));

        $request->attributes->set($configuration->getName(), $leagueId);
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
