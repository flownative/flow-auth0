<?php
declare(strict_types=1);

namespace Flownative\Auth0\Controller;

/*
 * This file is part of the Flownative.Auth0 package.
 *
 * (c) Robert Lemke, Flownative GmbH - www.flownative.com
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Auth0\SDK\Auth0;
use Auth0\SDK\Exception\CoreException;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Annotations as Flow;

class Auth0Controller extends ActionController
{

    /**
     * @Flow\InjectConfiguration()
     * @var array
     */
    protected $settings;

    public function indexAction()
    {
        try {
            $auth0 = new Auth0([
                'domain' => $this->settings['domain'],
                'client_id' => $this->settings['clientId'],
                'client_secret' => $this->settings['clientSecret'],
                'redirect_uri' => $this->settings['redirectUri'],
                'persist_id_token' => $this->settings['persistIdToken'],
                'persist_access_token' => $this->settings['persistAccessToken'],
                'persist_refresh_token' => $this->settings['persistRefreshToken']
            ]);
        } catch (CoreException $e) {
            \Neos\Flow\var_dump($e);
        }

        \Neos\Flow\var_dump($auth0->getUser());

        return '';
    }
}
