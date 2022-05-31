<?php

namespace SprykerEco\Glue\UnzerRestApi\Plugin\CheckoutRestApiExtension;

use Generated\Shared\Transfer\RestCheckoutDataTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Zed\CheckoutRestApiExtension\Dependency\Plugin\CheckoutDataExpanderPluginInterface;

class CheckoutDataExpanderPlugin implements CheckoutDataExpanderPluginInterface
{
    public function expandCheckoutData(
        RestCheckoutDataTransfer $restCheckoutDataTransfer,
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
    ): RestCheckoutDataTransfer
    {

    }
}
