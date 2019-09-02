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

class OAuthClient extends \Flownative\OAuth2\Client\OAuthClient
{
    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return 'https://' . $this->domain;
    }

    /**
     * @return string
     */
    public function getServiceType(): string
    {
        return 'auth0';
    }
}
