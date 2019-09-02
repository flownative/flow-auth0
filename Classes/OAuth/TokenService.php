<?php
declare(strict_types=1);

namespace Flownative\Auth0\OAuth;

/*
 * This file is part of the Flownative.Auth0 package.
 *
 * (c) Robert Lemke, Flownative GmbH - www.flownative.com
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
class TokenService
{
    /**
     * @param string $domain
     * @param string $clientId
     * @param string $clientSecret
     * @return Token
     */
    public function getToken(string $domain, string $clientId, string $clientSecret): Token
    {
        $oAuthClient = new OAuthClient('auth0');
        $oAuthClient->setDomain($domain);
        $oAuthClient->setClientId($clientId);

#        $oAuthClient->getAccessToken($clientId, $clientSecret);

        return new Token('eyJ0eXA…');
    }
}
