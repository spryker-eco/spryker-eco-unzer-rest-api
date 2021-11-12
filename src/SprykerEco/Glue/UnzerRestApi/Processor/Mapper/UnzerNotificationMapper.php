<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestUnzerNotificationAttributesTransfer;
use Generated\Shared\Transfer\UnzerNotificationTransfer;

class UnzerNotificationMapper implements UnzerNotificationMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestUnzerNotificationAttributesTransfer $restUnzerNotificationAttributesTransfer
     * @param \Generated\Shared\Transfer\UnzerNotificationTransfer $unzerNotificationTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerNotificationTransfer
     */
    public function mapRestUnzerNotificationAttributesTransferToUnzerNotificationTransfer(
        RestUnzerNotificationAttributesTransfer $restUnzerNotificationAttributesTransfer,
        UnzerNotificationTransfer $unzerNotificationTransfer
    ): UnzerNotificationTransfer {
        return $unzerNotificationTransfer->fromArray($restUnzerNotificationAttributesTransfer->toArray(), true);
    }
}
