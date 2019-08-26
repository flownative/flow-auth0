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
use Neos\Flow\Http\Request;
use Neos\Flow\Http\Response;
use Neos\Flow\Security\Authentication\EntryPoint\AbstractEntryPoint;
use Neos\Flow\Annotations as Flow;

/**
 * A Flow authentication provider based on Auth0
 */
class Auth0EntryPoint extends AbstractEntryPoint
{
    /**
     * @Flow\Inject
     * @var Auth0Factory
     */
    protected $auth0Factory;

    /**
     * Triggers an authentication
     *
     * @param Request $request
     * @param Response $response
     * @return void
     * @throws \Auth0\SDK\Exception\CoreException
     */
    public function startAuthentication(Request $request, Response $response): void
    {
        $auth0 = $this->auth0Factory->create();
        $auth0->login();
    }
}
