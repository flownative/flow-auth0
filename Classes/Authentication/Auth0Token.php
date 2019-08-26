<?php
declare(strict_types=1);

namespace Flownative\Auth0\Authentication;

/*
 * This file is part of the Flownative.Auth0 package.
 *
 * (c) Robert Lemke, Flownative GmbH - www.flownative.com
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Flownative\Auth0\Auth0Factory;
use Flownative\Beach\Domain\Projection\User\User;
use Neos\Flow\Mvc\ActionRequest;
use Neos\Flow\Security\Authentication\Token\AbstractToken;
use Neos\Flow\Annotations as Flow;

/**
 * A token for the Auth0 Authentication Provider
 */
class Auth0Token extends  AbstractToken {

    /**
     * @Flow\Inject
     * @var Auth0Factory
     */
    protected $auth0Factory;

    /**
     * @param ActionRequest $actionRequest
     * @return bool|void
     * @throws
     */
    public function updateCredentials(ActionRequest $actionRequest): void
    {
        $httpRequest = $actionRequest->getHttpRequest();
        if ($httpRequest->getMethod() !== 'GET') {
            return;
        }

        if (!$httpRequest->hasArgument('state') || !$httpRequest->hasArgument('code')) {
            return;
        }

        $state = $httpRequest->getArgument('state');
        $code =  $httpRequest->getArgument('code');

        if (!$state || !$code) {
            return;
        }

        $auth0 = $this->auth0Factory->create();
#        $auth0->login($state);
        $user = $auth0->getUser();
        \Neos\Flow\var_dump($user);

        if (!empty($user)) {
            exit;
            $user = null;
            $userFinder = $this->userFinder;
            $this->securityContext->withoutAuthorizationChecks(function () use ($userFinder, $emailAddress, &$user) {
                $user = $userFinder->findOneByEmailAddress($emailAddress);
            });

            if ($user instanceof User) {
                $this->credentials['userIdentifier'] = $user->userIdentifier;
                $this->credentials['password'] = $password;
                $this->setAuthenticationStatus(self::AUTHENTICATION_NEEDED);
            }
        }
    }
}
