<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Dependency;

use Generated\Shared\Transfer\UnzerNotificationTransfer;

interface UnzerRestApiToUnzerClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerNotificationTransfer $unzerNotificationTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerNotificationTransfer
     */
    public function processNotification(UnzerNotificationTransfer $unzerNotificationTransfer): UnzerNotificationTransfer;
}
