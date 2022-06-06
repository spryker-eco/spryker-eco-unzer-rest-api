<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Dependency;

use Generated\Shared\Transfer\UnzerNotificationTransfer;

class UnzerRestApiToUnzerClientBridge implements UnzerRestApiToUnzerClientInterface
{
    /**
     * @var \SprykerEco\Client\Unzer\UnzerClientInterface
     */
    protected $unzerClient;

    /**
     * @param \SprykerEco\Client\Unzer\UnzerClientInterface $unzerClient
     */
    public function __construct($unzerClient)
    {
        $this->unzerClient = $unzerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerNotificationTransfer $unzerNotificationTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerNotificationTransfer
     */
    public function processNotification(UnzerNotificationTransfer $unzerNotificationTransfer): UnzerNotificationTransfer
    {
        return $this->unzerClient->processNotification($unzerNotificationTransfer);
    }
}
