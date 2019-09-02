<?php
declare(strict_types=1);

namespace Flownative\Auth0\Api;

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
 * Wrapper for the Auth0 Management class.
 *
 * The constructor options are configured via Flow Objects configuration
 *
 * @Flow\Scope("singleton")
 */
class Management extends \Auth0\SDK\API\Management
{
    /**
     * @param $token
     * @param $domain
     * @param array $guzzleOptions
     * @param null $returnType
     */
    public function __construct($token, $domain, $guzzleOptions = [], $returnType = null)
    {
        parent::__construct((string)$token, $domain, $guzzleOptions, $returnType);
    }
}
