<?php

namespace Trotch;

class Auth
{

    /**
     * @var User
     */
    protected $userService;

    /**
     * @param User $userService
     */
    function __construct($userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return bool
     */
    function isAuthenticated()
    {

    }

    /**
     * @param string $provider
     * @throws \LogicException
     */
    function authenticate($provider)
    {
        switch ($provider) {

            case 'localhost':

                // TODO
                throw new \LogicException('TODO: Local login');

            default:

                global $CONFIG;
                $hybridauth = new \Hybrid_Auth($CONFIG['HYBRIDAUTH']);
                $adapter = $hybridauth->authenticate($provider);
        }

        /** @var \Hybrid_Providers_Twitter $profile */
        // $profile = $adapter->getUserProfile();

    }


    /**
     *
     */
    function revoke()
    {

    }

}
