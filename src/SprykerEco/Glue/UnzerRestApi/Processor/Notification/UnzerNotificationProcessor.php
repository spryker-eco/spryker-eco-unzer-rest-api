<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Processor\Notification;

use Generated\Shared\Transfer\RestUnzerNotificationsAttributesTransfer;
use Generated\Shared\Transfer\UnzerNotificationTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface;
use Symfony\Component\HttpFoundation\Response;

class UnzerNotificationProcessor implements UnzerNotificationProcessorInterface
{
    /**
     * @var \SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface
     */
    protected $unzerClient;

    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * @param \SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface $unzerClient
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     */
    public function __construct(
        UnzerRestApiToUnzerClientInterface $unzerClient,
        RestResourceBuilderInterface $restResourceBuilder
    ) {
        $this->unzerClient = $unzerClient;
        $this->restResourceBuilder = $restResourceBuilder;
    }

    /**
     * @param \Generated\Shared\Transfer\RestUnzerNotificationsAttributesTransfer $restUnzerNotificationsAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function processNotification(RestUnzerNotificationsAttributesTransfer $restUnzerNotificationsAttributesTransfer): RestResponseInterface
    {
        $unzerNotificationTransfer = (new UnzerNotificationTransfer())
            ->fromArray($restUnzerNotificationsAttributesTransfer->toArray(), true);

        $unzerNotificationTransfer = $this->unzerClient->processNotification($unzerNotificationTransfer);

        return $this->createRestResponse($unzerNotificationTransfer->getIsProcessedOrFail());
    }

    /**
     * @param bool $isProcessed
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createRestResponse(bool $isProcessed): RestResponseInterface
    {
        $responseCode = $isProcessed ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST;

        return $this->restResourceBuilder
            ->createRestResponse()
            ->setStatus($responseCode);
    }
}
