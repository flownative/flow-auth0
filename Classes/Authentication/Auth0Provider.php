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

use Neos\Flow\Security\Authentication\Provider\AbstractProvider;
use Neos\Flow\Security\Authentication\TokenInterface;

/**
 * A Flow authentication provider based on Auth0
 */
class Auth0Provider extends AbstractProvider
{
    /**
     * @return array
     */
    public function getTokenClassNames(): array
    {
        return [Auth0Token::class];
    }

    public function authenticate(TokenInterface $authenticationToken)
    {
        // TODO: Implement authenticate() method.
    }
}
