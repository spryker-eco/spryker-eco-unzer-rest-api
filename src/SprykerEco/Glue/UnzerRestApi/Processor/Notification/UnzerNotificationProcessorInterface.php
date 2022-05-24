<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Processor\Notification;

use Generated\Shared\Transfer\GlueResponseTransfer;
use Generated\Shared\Transfer\UnzerNotificationAttributesTransfer;

interface UnzerNotificationProcessorInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerNotificationAttributesTransfer $unzerNotificationAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    public function processNotification(UnzerNotificationAttributesTransfer $unzerNotificationAttributesTransfer): GlueResponseTransfer;
}
