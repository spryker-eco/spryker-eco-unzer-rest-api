<?php

namespace SprykerEco\Glue\UnzerRestApi\Plugin\CheckoutRestApiExtension;

use Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCheckoutDataTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Glue\CheckoutRestApiExtension\Dependency\Plugin\CheckoutDataResponseMapperPluginInterface;

class CheckoutDataResponseMapperPlugin implements CheckoutDataResponseMapperPluginInterface
{
    /**
     * Specification:
     * - .
     *
     * @api
     *
     * @param RestCheckoutDataTransfer $restCheckoutDataTransfer
     * @param RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param RestCheckoutDataResponseAttributesTransfer $restCheckoutResponseAttributesTransfer
     *
     * @return RestCheckoutDataResponseAttributesTransfer
     */
    public function mapRestCheckoutDataResponseTransferToRestCheckoutDataResponseAttributesTransfer(
        RestCheckoutDataTransfer $restCheckoutDataTransfer,
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        RestCheckoutDataResponseAttributesTransfer $restCheckoutResponseAttributesTransfer
    ): RestCheckoutDataResponseAttributesTransfer
    {

    }
}
