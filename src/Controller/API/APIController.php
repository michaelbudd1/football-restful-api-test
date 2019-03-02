<?php
declare(strict_types=1);

namespace App\Controller\API;

use App\Entity\User;
use App\Football\Interfaces\UserId as UserIdInterface;
use App\Football\Models\UserId;
use App\Football\Services\Interfaces\FootballTeamService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AuthenticatorInterface;

abstract class APIController
{
    /**
     * @var AuthenticatorInterface
     */
    protected $authenticator;

    /**
     * @var UserProviderInterface
     */
    protected $userProvider;

    /**
     * @var FootballTeamService
     */
    protected $footballTeamService;

    /**
     * @param AuthenticatorInterface $authenticator
     * @param UserProviderInterface  $userProvider
     * @param FootballTeamService    $footballTeamService
     */
    public function __construct(
        AuthenticatorInterface $authenticator,
        UserProviderInterface $userProvider,
        FootballTeamService $footballTeamService
    ) {
        $this->authenticator       = $authenticator;
        $this->userProvider        = $userProvider;
        $this->footballTeamService = $footballTeamService;
    }

    /**
     * @param Request $request
     *
     * @return UserIdInterface
     */
    protected function userId(Request $request): UserIdInterface
    {
        $credentials = $this->authenticator->getCredentials($request);

        /** @var User $user */
        $user = $this->authenticator->getUser($credentials, $this->userProvider);

        return new UserId($user->getId());
    }
}