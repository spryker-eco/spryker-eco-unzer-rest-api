<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Processor\Notification;

use Generated\Shared\Transfer\RestUnzerNotificationsAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

interface UnzerNotificationProcessorInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestUnzerNotificationsAttributesTransfer $restUnzerNotificationsAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function processNotification(RestUnzerNotificationsAttributesTransfer $restUnzerNotificationsAttributesTransfer): RestResponseInterface;
}
