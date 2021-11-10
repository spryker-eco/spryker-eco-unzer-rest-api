<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Processor\Notification;

use Generated\Shared\Transfer\RestUnzerNotificationAttributesTransfer;
use Generated\Shared\Transfer\UnzerNotificationTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface;
use SprykerEco\Glue\UnzerRestApi\Processor\Mapper\UnzerNotificationMapperInterface;
use Symfony\Component\HttpFoundation\Response;

class UnzerNotificationProcessor implements UnzerNotificationProcessorInterface
{
    /**
     * @var \SprykerEco\Glue\UnzerRestApi\Processor\Mapper\UnzerNotificationMapperInterface
     */
    protected $unzerNotificationMapper;

    /**
     * @var \SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface
     */
    protected $unzerClient;

    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $resourceBuilder
     */
    protected $resourceBuilder;

    /**
     * @param \SprykerEco\Glue\UnzerRestApi\Processor\Mapper\UnzerNotificationMapperInterface $unzerNotificationMapper
     * @param \SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface $unzerClient
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     */
    public function __construct(
        UnzerNotificationMapperInterface $unzerNotificationMapper,
        UnzerRestApiToUnzerClientInterface $unzerClient,
        RestResourceBuilderInterface $restResourceBuilder
    ) {
        $this->unzerNotificationMapper = $unzerNotificationMapper;
        $this->unzerClient = $unzerClient;
        $this->resourceBuilder = $restResourceBuilder;
    }

    /**
     * @param \Generated\Shared\Transfer\RestUnzerNotificationAttributesTransfer $restUnzerNotificationAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function processNotification(RestUnzerNotificationAttributesTransfer $restUnzerNotificationAttributesTransfer): RestResponseInterface
    {
        $unzerNotificationTransfer = $this->unzerNotificationMapper
            ->mapRestUnzerNotificationAttributesTransferToUnzerNotificationTransfer(
                $restUnzerNotificationAttributesTransfer,
                new UnzerNotificationTransfer(),
            );

        $unzerNotificationTransfer = $this->unzerClient->processNotification($unzerNotificationTransfer);

        return $this->createRestSuccessResponse($unzerNotificationTransfer->getIsProcessed());
    }

    /**
     * @param bool $isProcessed
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createRestSuccessResponse(bool $isProcessed): RestResponseInterface
    {
        $responseCode = $isProcessed ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST;

        return $this->resourceBuilder
            ->createRestResponse()
            ->setStatus($responseCode);
    }
}
