<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Controller;

use Generated\Shared\Transfer\RestUnzerNotificationsAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \SprykerEco\Glue\UnzerRestApi\UnzerRestApiFactory getFactory()
 */
class UnzerNotificationsController extends AbstractController
{
    /**
     * @Glue({
     *     "post": {
     *          "summary": [
     *              "Handles Unzer payment notification request"
     *          ],
     *          "parameters": [
     *              {
     *                  "name": "Accept-Language",
     *                  "in": "header"
     *              },
     *              {
     *                  "name": "Content-Type",
     *                  "in": "header"
     *              }
     *          ],
     *          "responses": {
     *              "400": "Bad Request.",
     *              "406": "Request not accepted."
     *          }
     *     }
     * })
     *
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Generated\Shared\Transfer\RestUnzerNotificationsAttributesTransfer $restUnzerNotificationsAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function postAction(
        RestRequestInterface $restRequest,
        RestUnzerNotificationsAttributesTransfer $restUnzerNotificationsAttributesTransfer
    ): RestResponseInterface {
        return $this->getFactory()
            ->createUnzerNotificationProcessor()
            ->processNotification($restUnzerNotificationsAttributesTransfer);
    }
}
