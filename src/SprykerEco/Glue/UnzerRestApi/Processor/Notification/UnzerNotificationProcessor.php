<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Processor\Notification;

use Generated\Shared\Transfer\GlueResponseTransfer;
use Generated\Shared\Transfer\UnzerNotificationAttributesTransfer;
use Generated\Shared\Transfer\UnzerNotificationTransfer;
use SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface;
use Symfony\Component\HttpFoundation\Response;

class UnzerNotificationProcessor implements UnzerNotificationProcessorInterface
{
    /**
     * @var \SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface
     */
    protected $unzerClient;

    /**
     * @param \SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface $unzerClient
     */
    public function __construct(UnzerRestApiToUnzerClientInterface $unzerClient)
    {
        $this->unzerClient = $unzerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerNotificationAttributesTransfer $unzerNotificationAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    public function processNotification(UnzerNotificationAttributesTransfer $unzerNotificationAttributesTransfer): GlueResponseTransfer
    {
        $unzerNotificationTransfer = (new UnzerNotificationTransfer())
            ->fromArray($unzerNotificationAttributesTransfer->toArray(), true);

        $unzerNotificationTransfer = $this->unzerClient->processNotification($unzerNotificationTransfer);

        return $this->createRestResponse($unzerNotificationTransfer->getIsProcessedOrFail());
    }

    /**
     * @param bool $isProcessed
     *
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    protected function createRestResponse(bool $isProcessed): GlueResponseTransfer
    {
        $responseStatusCode = $isProcessed ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST;

        return (new GlueResponseTransfer())->setHttpStatus($responseStatusCode);
    }
}
