<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Controller;

use Generated\Shared\Transfer\GlueResponseTransfer;
use Generated\Shared\Transfer\UnzerNotificationAttributesTransfer;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \SprykerEco\Glue\UnzerRestApi\UnzerRestApiFactory getFactory()
 */
class UnzerNotificationController extends AbstractController
{
    /**
     * @param \Generated\Shared\Transfer\UnzerNotificationAttributesTransfer $unzerNotificationsAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    public function postAction(
        UnzerNotificationAttributesTransfer $unzerNotificationsAttributesTransfer
    ): GlueResponseTransfer {
        return $this->getFactory()
            ->createUnzerNotificationProcessor()
            ->processNotification($unzerNotificationsAttributesTransfer);
    }
}
