<?php
declare(strict_types=1);

namespace Flownative\Auth0\Command;

/*
 * This file is part of the Flownative.Auth0 package.
 *
 * (c) Robert Lemke, Flownative GmbH - www.flownative.com
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Exception;
use Flownative\Auth0\Api\Management;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;

class Auth0CommandController extends CommandController
{
    /**
     * @Flow\Inject(lazy=false)
     * @var Management
     */
    protected $management;

    /**
     * Test connectivity
     *
     * This command allows you to run a quick test for checking if the Auth0 management
     * API can be reached and credentials are configured correctly.
     *
     * @return void
     * @throws Exception
     */
    public function testCommand(): void
    {
        $this->outputLine('Sending request to the Management API ...' . PHP_EOL);

        $users = $this->management->users->getAll([], [], [], 1, 1);
        if (!is_array($users)) {
            $this->outputLine('<error>Received no valid response from users API.</error>');
            exit (1);
        }
        if (count($users) < 1) {
            $this->outputLine('<error>Received an empty result from users API.</error>');
            exit (2);
        }

        $rows = [];
        foreach ($users[0] as $key => $value) {
            if (!is_scalar($value)) {
                $value = '…';
            }
            $rows[] = [$key, $value];
        }

        $this->outputLine('<success>Successfully retrieved a user</success>' . PHP_EOL);
        $this->output->outputTable($rows, ['key', 'value']);
    }
}
